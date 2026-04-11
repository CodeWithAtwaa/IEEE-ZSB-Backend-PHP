<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{

    protected $routes = [];
    public function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null,
        ];

        return     $this;
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function get($uri, $controller)
    {
        return  $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return  $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller)
    {
        return  $this->add($uri, $controller, 'DELETE');
    }

    public function put($uri, $controller)
    {
        return  $this->add($uri, $controller, 'PUT');
    }

    public function  patch($uri, $controller)
    {
        return  $this->add($uri, $controller, 'PATCH');
    }


    public function previousURI() {
        return $_SERVER['HTTP_REFERER'] ;
    }

    protected function abort($value = 404)
    {
        http_response_code($value);
        require base_path("views/page_404.php");
        exit();
    }



    public function route($uri = null, $method = null)
    {
        $uri = $uri ?? (parse_url($_SERVER['REQUEST_URI'])['path'] ?? '/');
        $method = strtoupper($method ?? ($_SERVER['REQUEST_METHOD'] ?? 'GET'));

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                // run middleware only when one is configured and mapped
                if (!empty($route['middleware']) && isset(Middleware::MAP[$route['middleware']])) {
                    (new Middleware())->resolve($route['middleware']);
                }

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }
}
