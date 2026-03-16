<?php
$heading = "Note";

$config = require("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);

$id = (int) $_GET['id'];
$currentUserId = 1;


$note = $db->query("SELECT * FROM notes WHERE  id = :id", ['id' => $id])->fetch();

if (! $note) {
    abort();
}



if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}


require('views/note.view.php');
