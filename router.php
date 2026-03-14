<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$rouets = [
    '/' => "Controllers/index.php",
    '/about' => "Controllers/about.php",
    '/contact' => "Controllers/contact.php",
];

function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}


function routeControllers($uri, $rouets)
{

    if (array_key_exists($uri, $rouets)) {
        require $rouets[$uri];
    } else {
        abort();
    }
}

routeControllers($uri, $rouets);
