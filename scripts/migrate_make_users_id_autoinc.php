<?php
// Ensure application constants and autoloader are available like public/index.php
define('BASE_PATH', realpath(__DIR__ . '/..') . '/');
require BASE_PATH . 'Core/helper.php';

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require BASE_PATH . "{$class}.php";
});

require BASE_PATH . 'bootstrap.php';

use Core\App;

$db = App::container()->resolve('Core\\Database');

echo "Running users table migration...\n";

try {
    $db->query("ALTER TABLE users MODIFY id INT NOT NULL AUTO_INCREMENT PRIMARY KEY;");
    echo "ALTER TABLE succeeded: 'id' is now AUTO_INCREMENT.\n";
    exit(0);
} catch (\Throwable $e) {
    echo "ALTER TABLE failed: " . $e->getMessage() . "\n";
}

echo "Attempting non-destructive copy-migration to users_new...\n";
try {
    $db->query("CREATE TABLE IF NOT EXISTS users_new (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    $db->query("INSERT INTO users_new (email, password) SELECT email, password FROM users;");

    $db->query("RENAME TABLE users TO users_old, users_new TO users;");

    echo "Copy-migration succeeded. Original table preserved as 'users_old'.\n";
} catch (\Throwable $e) {
    echo "Copy-migration failed: " . $e->getMessage() . "\n";
    exit(1);
}

echo "Migration finished. Please verify the schema and retest registration.\n";
