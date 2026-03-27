<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$id = $_POST['id'];
$body = $_POST['body'];

$errors = [];

if (!Validator::string($body, 6, 255)) {
    $errors['body'] = "Body must be between 6 and 255 characters.";
}

if (!empty($errors)) {
    return view('notes/edit.php', [
        'errors' => $errors
    ]);
}

$db->query(
    "UPDATE notes SET body = ? WHERE id = ?",
    [$body, $id]
);

header('Location: /notes');
exit();