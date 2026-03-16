<?php
$heading = "Note";
$currentUserId = 1;

$config = require("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);


$id = (int) $_GET['id'];
$note = $db->query("SELECT * FROM notes WHERE  id = :id", ['id' => $id])->findOrFail();

authorize($note['user_id'] === $currentUserId , 403);


require('views/note.view.php');
