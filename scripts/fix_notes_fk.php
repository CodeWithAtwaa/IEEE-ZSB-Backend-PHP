<?php
// Fix notes.user_id foreign key to reference `users(id)` instead of `users_old(id)`
define('BASE_PATH', realpath(__DIR__ . '/..') . '/');
require BASE_PATH . 'Core/helper.php';

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require BASE_PATH . "{$class}.php";
});

require BASE_PATH . 'bootstrap.php';

use Core\App;

$db = App::container()->resolve('Core\\Database');

echo "Fixing notes FK...\n";
try {
    // Attempt to drop known FK name
    $db->query("ALTER TABLE notes DROP FOREIGN KEY fk_user_id;");
    echo "Dropped foreign key fk_user_id\n";
} catch (\Throwable $e) {
    echo "Warning dropping fk_user_id: " . $e->getMessage() . "\n";
}

try {
    $db->query("ALTER TABLE notes ADD CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE;");
    echo "Added foreign key fk_user_id -> users(id)\n";
} catch (\Throwable $e) {
    echo "Failed to add FK: " . $e->getMessage() . "\n";
    exit(1);
}

echo "Done. Verify by running your app or checking schema.\n";
