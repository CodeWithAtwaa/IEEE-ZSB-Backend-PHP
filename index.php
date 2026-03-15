<?php

require("functions.php");

// Connect to our Mysql Database

$dsn = "mysql:host=localhost;dbname=IEEE_Backend_PHP;charset=utf8mb4";
$username = "root";
$password = "MyRoot@1234";

$pdo = new PDO($dsn , $username , $password);
$statment = $pdo->prepare("SELECT * FROM users");
$statment->execute();
$result = $statment->fetchAll(PDO::FETCH_ASSOC);

dd($result);


require('router.php');


