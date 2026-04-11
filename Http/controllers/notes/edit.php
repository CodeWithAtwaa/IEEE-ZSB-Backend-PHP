<?php
use Core\App;
use Core\Database;

$statment = App::container()->resolve(Database::class);


$currentUserId = $_SESSION['user']['id'] ?? null;

if (! $currentUserId) {
    header('Location: /login');
    die();
}

$note = $statment->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
])->findOrFaild();


authorize($note['user_id'] === $currentUserId);



$heading = "Edit Note";
view("notes/edit.view.php", compact("heading", "errors", "note"));
