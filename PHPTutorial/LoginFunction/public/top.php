<?php
require_once('../classes/UserLogic.php');

session_start();

// error array
$err = [];

// validation
if (!$email = filter_input(INPUT_POST, 'email')) {
  $err['email'] = 'メールアドレスを記入してください';
}
if (!$passwd = filter_input(INPUT_POST, 'passwd')) {
  $err['passwd'] = 'パスワードを記入してください';
}

if (count($err) > 0) {
  $_SESSION = $err;
  header('Location: login.php');
  return;
}

// ログイン成功処理
$result = UserLogic::login($email, $passwd);
if (!$result) {
  header('Location: login.php');
  return;
}
echo 'ログインしました。';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザ登録完了</title>
</head>

<body>
  <?php if (count($err) > 0) : ?>
    <?php foreach ($err as $e) : ?>
      <p><?php echo $e ?></p>
    <?php endforeach ?>
  <?php else : ?>
    <p>登録完了しました。</p>
  <?php endif ?>
  <a href="./login.php">戻る</a>

</body>

</html>