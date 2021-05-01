<?php
require_once "dbconnect.php";

// ユーザ入力なし query
$sql = "select * from test_table";
$stmt = $pdo->query($sql); // sql実行

$result = $stmt->fetchAll();

echo "<pre>";
var_dump($result);
echo "</pre>";

// ユーザ入力あり prepare, bind, execute
// $sql = "select * from test_table where id = :id"; // 名前付きプレースホルダー
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue("id", 1, PDO::PARAM_INT); // 紐付け
// $stmt->execute(); // 実行

// $result = $stmt->fetchAll();

// var_dump($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DBtest</title>
</head>

<body>
  <h2>index.phpです。</h2>
  <p>名前を入力してください。</p>
  <form action="insert.php" method="POST">
    氏名<input type="text" name="name">
    <input type="submit" value="送信">
  </form>
</body>

</html>