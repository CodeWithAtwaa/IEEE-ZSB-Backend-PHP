<?php

use Core\App;

$db = App::resolve('Core\Database');

$id = (int) $_POST['id'];

$note = $db->query(
    "SELECT * FROM notes WHERE id = :id",
    ['id' => $id]
)->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId, 403);

$db->query(
    "DELETE FROM notes WHERE id = :id",
    ['id' => $id]
);

header('Location: /notes');
exit();