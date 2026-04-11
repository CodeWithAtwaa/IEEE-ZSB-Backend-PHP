<?php
$dsn = 'mysql:host=localhost;port=3306;dbname=mvc;charset=utf8mb4';
$user = 'root';
$pass = 'MyRoot@1234';
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $st = $pdo->query('SELECT id, body, user_id FROM notes ORDER BY id DESC LIMIT 20');
    $rows = $st->fetchAll(PDO::FETCH_ASSOC);
    if (! $rows) {
        echo "No notes found.\n";
        exit;
    }
    foreach ($rows as $r) {
        printf("%d | user_id=%s | %s\n", $r['id'], $r['user_id'] ?? 'NULL', $r['body']);
    }
} catch (PDOException $e) {
    echo "DB error: " . $e->getMessage() . "\n";
}
