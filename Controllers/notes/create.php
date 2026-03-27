<?php

$heading = "Create Note";
$error = [];
view('notes/create.php', [
    'heading' => $heading,
    'error' => $error,
]);
