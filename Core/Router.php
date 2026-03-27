<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function put($uri, $controller)
    {
        $this->routes['PUT'][$uri] = $controller;
    }

    public function patch($uri, $controller)
    {
        $this->routes['PATCH'][$uri] = $controller;
    }

    public function delete($uri, $controller)
    {
        $this->routes['DELETE'][$uri] = $controller;
    }

    public function route($uri, $method)
    {
        $method = strtoupper($method);

        if (isset($this->routes[$method][$uri])) {
            return require base_path($this->routes[$method][$uri]);
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }
}