<?php

namespace Core\Middleware;

class Middleware
{
    public  const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public function resolve($key)
    {
        if(! $key) {
            return;
        }
        if(! isset(static::MAP[$key])) {
            throw new \Exception("No middleware mapped for key: {$key}");
        }

        $middlewareClass = static::MAP[$key];
        if (is_string($middlewareClass) && class_exists($middlewareClass)) {
            (new $middlewareClass())->handle();
        }
    }
}
