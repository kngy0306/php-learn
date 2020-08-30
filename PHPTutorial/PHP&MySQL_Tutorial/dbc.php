<?php

// 関数1つに1つの機能のみを持たせる -> testや管理のしやすさから
// 1. データベース接続
// 2. データ取得
// 3. カテゴリ名表示

// 1. DB接続
// 引数 : なし
// 返り値 : 接続結果
function dbConnect()
{
  $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
  $user = 'blog_user';
  $pass = 'passwd';

  try {
    $dbh = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // error表示するためのモード
    ]);
  } catch (PDOException $e) {
    echo '接続失敗' . $e->getMessage();
    exit();
  };

  return $dbh;
}
// 2. データを取得
// 引数 : なし
// 返り値 : データ
function getAllBlog()
{
  $dbh = dbConnect();
  // ①sqlの準備
  $sql = 'SELECT * FROM blog';
  // ②sqlの実行
  $stmt = $dbh->query($sql);
  // ③sqlの結果を受け取る
  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  return $result;
  $dbh = null;
}

$blogData = getAllBlog();

// 3. カテゴリ名を表示
// 引数 : 数字
// 返り値 : カテゴリ名
function setCategoryName($category)
{
  if ($category === '1') {
    return 'ブログ';
  } elseif ($category === '2') {
    return '日常';
  } else {
    return 'その他';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>blog一覧</title>
</head>

<body>
  <h2>ブログ一覧</h2>
  <table>
    <tr>
      <th>No</th>
      <th>タイトル</th>
      <th>カテゴリ</th>
    </tr>
    <?php foreach ($blogData as $column) : ?>
    <tr>
      <td><?php echo $column['id'] ?></td>
      <td><?php echo $column['title'] ?></td>
      <td><?php echo setCategoryName($column['category']) ?></td>
      <td><a href="./detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>