<?php
use Core\App;
use Core\Database;

$statment = App::container()->resolve(Database::class);


// require an id query parameter

if (! isset($_GET['id'])) {
    header('Location: /notes');
    die();
}

$id = (int) $_GET['id'];

$currentUserId = $_SESSION['user']['id'] ?? null;

$note = $statment->query("SELECT * FROM notes where id = :id", [
    'id' => $id
])->find();

// If the note doesn't exist, redirect to list
if (! $note) {
    header('Location: /notes');
    die();
}

authorize($note['user_id'] === $currentUserId);


$heading = "Note";
view("notes/show.view.php", compact("heading", "note"));
