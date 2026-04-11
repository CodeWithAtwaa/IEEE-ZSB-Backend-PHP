<?php

namespace Core;

class  ValidationException extends \Exception
{
    public readonly array $errors;
    public readonly array $old;


    public static function throw($errors, $old)
    {
        $instance = new static();
        $instance->errors = $errors;
        $instance->old = $old;
        Session::flash('_flashed', value: $errors);
        Session::flash('_old', value: $old);
        return $instance;
    }

}
