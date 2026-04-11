<?php
namespace Core;
class Validator
{

    // check if string is between min and max characters
    public  static function string($value, $min = 3, $max = 255)
    {
        $value = trim($value);
        if (strlen($value) < $min || strlen($value) > $max) {
            return false;
        }
        return true;
    }

    // check if value is a valid email
    public static function email($value)
    {
        return filter_var(trim($value), FILTER_VALIDATE_EMAIL) ? true : false;
    }
}


