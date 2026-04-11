<?php

$heading = "Create Note";
// ensure $errors is defined for the view
$errors = $errors ?? [];
view("notes/create.view.php", compact("heading", "errors"));
