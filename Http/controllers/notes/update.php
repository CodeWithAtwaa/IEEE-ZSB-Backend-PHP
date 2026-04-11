<?php
use Core\App;
use Core\Database;
use Core\Validator;

$statment = App::container()->resolve(Database::class);


$currentUserId = $_SESSION['user']['id'] ?? null;

if (! $currentUserId) {
    header('Location: /login');
    die();
}

$note = $statment->query("SELECT * FROM notes where id = :id", [
    'id' => $_POST['id']
])->findOrFaild();

authorize($note['user_id'] === $currentUserId);



$errors = [];

$body = $_POST['body'];
$id = $_POST['id'];

// check if body is less than 3 and greater than 255 characters
if (! Validator::string($body, 3, 255)) {
    $errors['body'] = "Description must be greater then 3 and  less than 255 characters";
}

if(count($errors)) {
    $heading = "Edit Note";
    view("notes/edit.view.php", compact("heading", "errors", "note"));
    die();
}   

if (! empty($errors)) {
    $heading = "Edit Note";
    view("notes/edit.view.php", compact("heading", "errors"));
    die();
}

//  update into database
if (empty($errors)) {
    $statment->query("UPDATE notes SET body = :body WHERE id = :id", [
        'body' => $body,
        'id' => $id
    ]);
}

header("Location: /notes");
die();
