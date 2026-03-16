<?php
$heading = "Create Note";
$config = require("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);
$currentUserId = 1;


$body == "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $body = $_POST['body'];
    $error = [];

    if (empty(trim($body))) {
        $error['body'] = "A body is required";
    }

    if (strlen(trim($body)) >= 255 || strlen(trim($body)) < 6) {
        $error['body'] = 'the max number of chars 255 and min numbers is 6 ';
    }

    if (empty(trim($error['body']))) {
        $query = "INSERT INTO notes (body , user_id) VALUES (?,?)";
        $statment  = $db->query($query, [$body, $currentUserId]);
    }
    
    $_SESSION['msg'] = "Note Created Successfully...!";
}
include('views/note-create.view.php');
