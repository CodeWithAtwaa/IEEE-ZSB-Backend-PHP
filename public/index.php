<?php
session_start();

use Core\Router;
use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "vendor/autoload.php";


require BASE_PATH . "Core/helper.php";


require base_path("bootstrap.php");

$router = new Router();
$rouets  = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ?? '/';

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
if (isset($_POST['_method'])) {
    $method = $_POST['_method'];
}


try {
    $router->route($uri, $method);
} catch (ValidationException $e) {
    Session::flash('_flashed', value: $e->errors);
    Session::flash('_old', value: $e->old);

    
    return redirct($router->previousURI());
}


Session::unflash();
