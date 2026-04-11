<?php

namespace Core;

class Container
{

    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key) {

        if (! array_key_exists($key, $this->bindings)) {
            throw new \Exception("Binding not found: $key");
        }

        $resolver = $this->bindings[$key];

        if (is_callable($resolver)) {
            return call_user_func($resolver);
        }

        return $resolver;
    }

}