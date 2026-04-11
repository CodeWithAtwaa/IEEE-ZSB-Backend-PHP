<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}


function urls($value)
{
    return ($_SERVER['REQUEST_URI'] === $value) ? "bg-gray-950/50 text-white"  :   "text-gray-300 hover:bg-white/5 hover:text-white";
}

function abort($statusCode = 404)
{
    http_response_code($statusCode);
    require base_path("views/{$statusCode}.php");
    die();
}
function authorize($condition, $statusCode = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($statusCode);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/{$path}");
}


function redirct($path)
{
    header("Location: {$path}");
    die();
}

function old($key, $default = null)
{
    return Core\Session::get('_old', [])[$key] ?? $default;
}
