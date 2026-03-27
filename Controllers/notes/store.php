<?php

use Core\App;
use Core\Database;
use Core\Validator;

require base_path("Core/Validator.php");
$db = App::resolve(Database::class);


$currentUserId = 1;

$body = "";
$error = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $body = $_POST['body'];


    if (! Validator::string($body, 6, 255)) {
        $error['body'] = "A body no more than 255 char and not less than 6 is required";
    }

    if (!empty($error)) {
        return    view('notes/create.php', [
            'heading' => $heading,
            'error' => $error,
        ]);
    }

    if (empty(trim($error['body']))) {
        $query = "INSERT INTO notes (body , user_id) VALUES (?,?)";
        $db->query($query, [$body, $currentUserId]);
        $_SESSION['msg'] = "Note Created Successfully...!";
    }

    header('location:  /notes');
    die();
}
