<?php

use Core\App;
use Core\Database;
use Core\Validator;

require base_path("Core/Validator.php");

$db = App::resolve(Database::class);

$currentUserId = 1;

$email = $password = "";
$error = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!Validator::string($name, 3, 255)) {
        $error['name'] = "Name must be between 3 and 255 characters";
    }

    if (!Validator::string($email, 6, 255)) {
        $error['email'] = "Email must be between 6 and 255 characters";
    }

    if (!Validator::string($password, 6, 255)) {
        $error['password'] = "Password must be between 6 and 255 characters";
    }

    if (!empty($error)) {
        return view('registration/create.php', [
            'heading' => $heading,
            'error' => $error
        ]);
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $db->query($query, [$name, $email, $hashedPassword]);

    header('location: /');
    die();
}
