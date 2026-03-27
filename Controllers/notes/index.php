<?php
use Core\Database;
$heading = "My Notes";

$config = require base_path("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);

$user_id = 1;
$notes = $db->query("SELECT * FROM notes WHERE user_id = ?", [$user_id])->all();



view('notes/index.php', [
    'heading' => $heading,
    'notes' => $notes,
]);
