<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$heading = "Login";

$error = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!Validator::string($email, 6, 255)) {
        $error['email'] = "Email must be between 6 and 255 characters";
    }

    if (!Validator::string($password, 6, 255)) {
        $error['password'] = "Password must be between 6 and 255 characters";
    }

    if (!empty($error)) {
        return view('session/create.php', [
            'heading' => $heading,
            'error' => $error
        ]);
    }

    $user = $db->query(
        "SELECT * FROM users WHERE email = ?",
        [$email]
    )->find();

    if ($user && password_verify($password, $user['password'])) {

        login([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ]);

        header('location: /');
        exit();
    }

    $error['email'] = "Invalid email or password";

    return view('sessions/create.php', [
        'heading' => $heading,
        'error' => $error
    ]);
}
