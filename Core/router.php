<?php

$rouets = require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];




function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}


function routeControllers($uri, $rouets)
{
    if (array_key_exists($uri, $rouets)) {
        require base_path($rouets[$uri]);
    } else {
        abort();
    }
}

routeControllers($uri, $rouets);
