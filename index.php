<?php
require("functions.php");
require("Database.php");
$config = require ("config.php");

$pdo = new Database($config['database'], $config['username'] , $config['password']);
dd($pdo->query("SELECT * FROM posts")->fetchAll());

require('router.php');
