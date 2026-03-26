<?php
$heading = "My Notes";

$config = require("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);

// $user_id = (int) $_GET['id'];
// dd($user_id);
$user_id = 1;
$notes = $db->query("SELECT * FROM notes WHERE user_id = ?" , [$user_id])->all();


require('views/notes.view.php');
