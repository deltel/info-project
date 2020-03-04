<?php

require_once 'essential.php';

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

try {
    $stmt = $pdo->query("SELECT id, firstname, lastname FROM users");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include_once 'users.view.php';
} catch (Exception $e) {
    echo $e->getMessage();
}
