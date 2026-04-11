<?php

use Core\App;
use Core\Database;

$statment = App::container()->resolve(Database::class);


$currentUserId = $_SESSION['user']['id'] ?? null;

$id = $_POST['id'] ?? $_GET['id'] ?? null;
if (! $id) {
    abort(400);
}

if (! $currentUserId) {
    header('Location: /login');
    die();
}

$note = $statment->query("SELECT * FROM notes where id = :id", [
    'id' => $id
])->findOrFaild();

authorize($note['user_id'] === $currentUserId);

$statment->query("DELETE FROM notes WHERE id = :id", [
    'id' => $id
]);

header('Location: /notes');
exit();
