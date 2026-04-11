<?php

use Core\App;
use Core\Database;
use Core\Validator;

$emil = $_POST['email'];
$password = $_POST['password'];

$errors = [];


// validate the form input
Validator::email($emil) ?: $errors['email'] = "Email is not valid";
Validator::string($password, 6, 255) ?: $errors['password'] = "Password must be greater than 6 characters";


if (! empty($errors)) {
    view("registeration/create.view.php", compact("errors"));
    die();
}


// check if email is already exists in the database
$statment = App::container()->resolve(Database::class);
$statment->query("SELECT * FROM users WHERE email = :email", [
    'email' => $emil
]);
$user = $statment->find();


//    if yes, redirct to a login page with a message "Email already exists, please login"
if ($user) {
    // then someone use email
    header("Location: /");
    die();
} else {


    $statment->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        'email' => $emil,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $statment->query("SELECT * FROM users WHERE email = :email", [
        'email' => $emil
    ]);
    $user = $statment->find();

    login($user);

    header("Location: /");
    die();
}
