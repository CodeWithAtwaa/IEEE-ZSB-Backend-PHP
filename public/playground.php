<?php

use Illuminate\Support\Collection;

require_once __DIR__ . "/../vendor/autoload.php";

$number = new Collection([1, 2, 3, 4, 5]);

$result = $number->filter(function ($value) {
    return $value <= 5;
});

var_dump($result);
