<?php
$blog = $_POST;

if ($blog['publish_status'] === 'un_publish') {
    echo '記事がありません。';
    return;
}
?>
<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>プログ</title>
</head>

<body>

  <h2><?php echo htmlspecialchars($blog['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
  <p>投稿日 : <?php echo htmlspecialchars($blog['post_at'], ENT_QUOTES, 'UTF-8'); ?></p>
  <p>カテゴリ : <?php echo htmlspecialchars($blog['category'], ENT_QUOTES, 'UTF-8'); ?></p>
  <hr>
  <p><?php echo nl2br(htmlspecialchars($blog['content'], ENT_QUOTES, 'UTF-8')); ?></p>
</body>

</html>