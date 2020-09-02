<?php
class Dbc
{
  protected $table_name;
  // 関数1つに1つの機能のみを持たせる -> testや管理のしやすさから
  // 1. データベース接続
  // 2. データ取得
  // 3. カテゴリ名表示

  // 1. DB接続
  // 引数 : なし
  // 返り値 : 接続結果
  protected function dbConnect()
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
  public function getAll()
  {
    $dbh = $this->dbConnect();
    // ①sqlの準備
    $sql = "SELECT * FROM $this->table_name";
    // ②sqlの実行
    $stmt = $dbh->query($sql);
    // ③sqlの結果を受け取る
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;

    $dbh = null;
  }

  // 引数 $id
  // 返り値 $result
  public function getById($id)
  {
    if (empty($id)) {
      exit('IDが不正です');
    }

    $dbh = $this->dbConnect();

    // SQL準備
    $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :id"); // :idがプレースホルダ
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

    // SQL実行
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
      exit('ブログがありません');
    }

    return $result;
  }
}