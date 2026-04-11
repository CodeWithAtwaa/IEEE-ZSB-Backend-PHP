<?php

use Core\Container;
// use Core\Database;

test('it can be tested', function () {
    // arrange
    $container = new Container();
    $container->bind('foo' , function(){
        return "bar";
    });
    
    // act
    $result = $container->resolve('foo');

    // assert/expect
    expect($result)->toBe('bar');
});

