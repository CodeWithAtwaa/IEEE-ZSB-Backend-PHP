<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];

$note = $db->query(
    "SELECT * FROM notes WHERE id = ?",
    [$id]
)->findOrFail();

view('notes/edit.php', [
    'heading' => 'Edit Note',
    'note' => $note
]);