<?php

use Core\Router;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {

    $path = base_path(str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php');

    if (file_exists($path)) {
        require $path;
    }

});


require base_path('bootstrap.php');

$router = new Router();

require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);