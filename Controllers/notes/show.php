<?php

use Core\App;
use Core\Database;

$heading = "Note";
$currentUserId = 1;

$db = App::resolve(Database::class);


$note = $db->query("SELECT * FROM notes WHERE  id = :id", ['id' => $_GET['id']])->findOrFail();
authorize($note['user_id'] === $currentUserId, 403);
view('notes/show.php', [
    'heading' => $heading,
    'note' => $note,
]);
