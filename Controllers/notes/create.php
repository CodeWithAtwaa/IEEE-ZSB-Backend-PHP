<?php
use Core\Database;
use Core\Validator;
require base_path("Core/Validator.php");
$heading = "Create Note";

$config = require base_path("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);
$currentUserId = 1;

$body = "";
$error = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $body = $_POST['body'];

    if (! Validator::string($body, 6, 255)) {
        $error['body'] = "A body no more than 255 char and not less than 6 is required";
    }

    if (empty(trim($error['body']))) {
        $query = "INSERT INTO notes (body , user_id) VALUES (?,?)";
        $db->query($query, [$body, $currentUserId]);
        $_SESSION['msg'] = "Note Created Successfully...!";
    }
}

view('notes/create.php', [
    'heading' => $heading,
    'error' => $error,
]);
