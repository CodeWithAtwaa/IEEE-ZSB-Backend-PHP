<?php

use Core\App;
use Core\Database;
use Core\Validator;

$statment = App::container()->resolve(Database::class);
require base_path("Core/Validator.php");


$errors = [];

$body = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $body = $_POST['body'];

    // check if body is less than 3 and greater than 255 characters
    if (! Validator::string($body, 3, 255)) {
        $errors['body'] = "Description must be greater then 3 and  less than 255 characters";
    }

    if (! empty($errors)) {
        $heading = "Create Note";
        view("notes/create.view.php", compact("heading", "errors"));
        die();
    }

    //  inser into database
    if (empty($errors)) {
        $user_id = $_SESSION['user']['id'] ?? null;
        if (! $user_id) {
            header('Location: /login');
            die();
        }

        $statment->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
            'body' => $body,
            'user_id' => $user_id
        ]);
    }

    // $_SESSION['_flashed']['success'] = "Note created successfully";

    header("Location: /notes");
    die();
}
