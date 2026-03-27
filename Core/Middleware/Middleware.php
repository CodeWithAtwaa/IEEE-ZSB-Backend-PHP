<?php

namespace Core\Middleware;

use Core\Middleware\Auth;
use Core\Middleware\Guest;

class Middleware
{
    public  const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve($key)
    {
        if (! $key) {
            return;
        }
        $middlewareClass = static::MAP[$key];

        (new $middlewareClass)->handle();
    }
}
