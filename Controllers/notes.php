<?php
$heading = "My Notes";

$config = require("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);

// $id = (int) $_GET['id'];
$id = 1;
$notes = $db->query("SELECT * FROM notes WHERE user_id = ?" , [$id])->fetchAll();


require('views/notes.view.php');
