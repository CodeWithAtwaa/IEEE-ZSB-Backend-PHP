<?php

use Core\Database;

$heading = "Note";
$currentUserId = 1;

$config = require base_path("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note = $db->query("DELETE FROM notes WHERE id=:id", [
        'id' => $_GET['id']
    ]);

    header('location: /notes');
    die();
} else {

    $id = (int) $_GET['id'];
    $note = $db->query("SELECT * FROM notes WHERE  id = :id", ['id' => $id])->findOrFail();

    authorize($note['user_id'] === $currentUserId, 403);
    view('notes/show.php', [
        'heading' => $heading,
        'note' => $note,
    ]);
}
