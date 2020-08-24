<?php

$dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
$user = 'blog_user';
$pass = 'passwd';

try{
  $dbh = new PDO($dsn,$user,$pass,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // error表示するためのモード
  ]);
  echo '接続成功';
  $dbh = null;
}catch(PDOException $e){
  echo '接続失敗'. $e->getMessage();
  exit();
};

?>