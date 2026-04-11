<?php
$dsn = 'mysql:host=localhost;port=3306;dbname=mvc;charset=utf8mb4';
$user = 'root';
$pass = 'MyRoot@1234';
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $st = $pdo->query('SELECT id, email FROM users ORDER BY id DESC LIMIT 50');
    $rows = $st->fetchAll(PDO::FETCH_ASSOC);
    if (! $rows) {
        echo "No users found.\n";
        exit;
    }
    foreach ($rows as $r) {
        printf("%d | %s\n", $r['id'], $r['email']);
    }
} catch (PDOException $e) {
    echo "DB error: " . $e->getMessage() . "\n";
}
