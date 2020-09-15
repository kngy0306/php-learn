<?php
session_start();
require_once('../classes/UserLogic.php');

// error array
$err = [];

// unsetでトークンが消えているので複数回送信ができなくなる
// signup_form以外からのアクセスは通さない
$token = filter_input(INPUT_POST, 'csrf_token');
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
  exit("不正なリクエスト");
}
unset($_SESSION['csrf_token']);


// validation
if (!$username = filter_input(INPUT_POST, 'username')) {
  $err[] = 'ユーザ名を記入してください';
}
if (!$email = filter_input(INPUT_POST, 'email')) {
  $err[] = 'メールアドレスを記入してください';
}
$passwd = filter_input(INPUT_POST, 'passwd');
// 正規表現
if (!preg_match("/\A[a-z\d]{8,100}+\z/i", $passwd)) {
  $err[] = 'パスワードは英数字8文字以上100文字以内です';
}
$pass_check = filter_input(INPUT_POST, 'pass_check');
if ($passwd !== $pass_check) {
  $err[] = '確認用パスワードが異なります';
}

if (count($err) === 0) {
  $hasCreated = UserLogic::createUser($_POST);

  if (!$hasCreated) {
    $err[] = '登録に失敗しました';
  }
}

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
  <a href="./signup_form.php">戻る</a>

</body>

</html>