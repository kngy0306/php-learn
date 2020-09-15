<?php
session_start();
require_once('../classes/UserLogic.php');

$err = $_SESSION;

$result = UserLogic::checkLogin();
if ($result) {
  header('Location: mypage.php');
  return;
}


// SESSIONファイルの中身を削除
// セッションに登録されたデータを全て破棄する
$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .error {
      color: red;
    }
  </style>
  <title>ログイン画面</title>
</head>

<body>
  <h2>ログインフォーム</h2>
  <p>kona@test2.com qwer1234</p>
  <?php if (isset($err['msg'])) : ?>
    <p class="error"><?php echo $err['msg']; ?></p>
  <?php endif; ?>
  <form action="login.php" method="POST">
    <p>
      <label for="email">メールアドレス: </label>
      <input type="text" name="email">
    </p>
    <?php if (isset($err['email'])) : ?>
      <p class="error"><?php echo $err['email']; ?></p>
    <?php endif; ?>
    <p>
      <label for="passwd">パスワード: </label>
      <input type="password" name="passwd">
    </p>
    <?php if (isset($err['email'])) : ?>
      <p class="error"><?php echo $err['email']; ?></p>
    <?php endif; ?>
    <p><input type="submit" value="ログイン"></p>
  </form>
  <a href="signup_form.php">新規登録はこちら</a>
</body>

</html>