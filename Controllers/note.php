<?php
$heading = "Note";

$config = require("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);

$id = (int) $_GET['id'];
// $id = 1;
$note = $db->query("SELECT * FROM notes WHERE id = ?" , [$id])->fetch();


require('views/note.view.php');
