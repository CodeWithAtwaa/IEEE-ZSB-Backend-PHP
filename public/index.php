<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {

    $path = base_path(str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php');

    if (file_exists($path)) {
        require $path;
    }

});

require base_path('Core/router.php');