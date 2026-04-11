<?php
$_SESSION['name'] = "Mohamed Tamer";

$heading = "Home";
view("index.view.php", compact("heading"));
