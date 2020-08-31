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

// 3. カテゴリ名を表示
// 引数 : 数字
// 返り値 : カテゴリ名
function setCategoryName($category)
{
  if ($category === '1') {
    return '日常';
  } elseif ($category === '2') {
    return 'プログラミング';
  } else {
    return 'その他';
  }
}

// 引数 $id
// 返り値 $result
function getBlog($id)
{
  if (empty($id)) {
    exit('IDが不正です');
  }

  $dbh = dbConnect();

  // SQL準備
  $stmt = $dbh->prepare('SELECT * FROM blog Where id = :id'); // :idがプレースホルダ
  $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

  // SQL実行
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$result) {
    exit('ブログがありません');
  }

  return $result;
}