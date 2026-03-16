<?php
require("functions.php");
require("Database.php");
$config = require("config.php");

$db = new Database($config['database'], $config['username'], $config['password']);


$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id = ?";

$user = $db->query($query, [$id])->fetch();

dd($user);



require('router.php');
