<?php
use Core\App;
use Core\Database;

$statment = App::container()->resolve(Database::class);


$currentUserId = $_SESSION['user']['id'] ?? null;

if (! $currentUserId) {
	header('Location: /login');
	die();
}

$notes = $statment->query("SELECT * FROM notes where user_id = :user_id", [
	'user_id' => $currentUserId
])->all();

$heading = "My Notes";
view("notes/index.view.php", compact("heading", "notes"));
