<?php

use Core\App;
use Core\Database;
$heading = "My Notes";


$db = App::resolve('Core\Database');

$user_id = 1;
$notes = $db->query("SELECT * FROM notes WHERE user_id = ?", [$user_id])->all();



view('notes/index.php', [
    'heading' => $heading,
    'notes' => $notes,
]);
