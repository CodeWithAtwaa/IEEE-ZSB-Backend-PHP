
<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);

$note = $db->query("DELETE FROM notes WHERE id=:id", [
    'id' => $_POST['id']
]);

header('location: /notes');
die();
