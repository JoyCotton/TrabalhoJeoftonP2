<?php
$dbConfig = [
  'host' => '127.0.0.1',
  'dbname' => 'meu_app',
  'user' => 'meu_user',
  'pass' => 'senha'
];

try {
  $pdo = new PDO(
    "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset=utf8mb4",
    $dbConfig['user'],
    $dbConfig['pass'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (PDOException $e) {
  error_log('DB Connection error: ' . $e->getMessage());
  die('Erro de conexão com o banco.');
}
