<?php
require_once 'env.php';
ini_set('display_errors', true);

function connect()
{
  $host = DB_HOST;
  $db = DB_NAME;
  $user = DB_USER;
  $pass = DB_PASS;

  $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

  try {
    $pdo = new PDO($dsn, $user, $pass, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    return $pdo;

  } catch (PDOException $e) {
    echo '接続失敗。' . $e;
    exit();
  }
}