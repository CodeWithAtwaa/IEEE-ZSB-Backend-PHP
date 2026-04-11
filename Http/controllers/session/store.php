<?php

use Http\Forms\LoginForm;
use Core\Authenticator;

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

$attributes = [
    'email' => $email,
    'password' => $password,
];

$form = LoginForm::validate($attributes);

$signIn = (new Authenticator())->attempt($attributes['email'], $attributes['password']);

if (!$signIn) {
    $form->adderror("email", "Email is not valid")->throw();
}


redirct(path: "/");
