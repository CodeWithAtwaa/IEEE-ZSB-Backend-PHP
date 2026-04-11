<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        Validator::email($attributes['email'] ?? null) ?: $this->errors['email'] = "Email is not valid";
        Validator::string($attributes['password'] ?? null, 6, 255) ?: $this->errors['password'] = "Password must be greater than 6 characters";
    }
    public static   function validate($attributes = [])
    {
        $instatnce = new static($attributes);

        return $instatnce->faild() ? $instatnce->throw() : $instatnce;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }


    public function faild()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function adderror($key, $message)
    {
        $this->errors[$key] = $message;

        return $this;
    }
}

