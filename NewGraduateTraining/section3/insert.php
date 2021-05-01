<?php
require_once "dbconnect.php";

if (empty($_POST["name"])) {
  echo "名前が入力されていません。";
  echo "<a href='./index.php'>戻る</a>";
  exit();
}
$name = $_POST["name"];

$sql = "insert into test_table (id, name, created_at, updated_at) values (null, '" . $name . "', now(), null)";

$pdo->query($sql);

header('Location: ./index.php');