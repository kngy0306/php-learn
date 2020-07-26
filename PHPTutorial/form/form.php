<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPForm</title>
</head>

<body>
  <h2>ブログフォーム</h2>
  <form action="blog.php" method="POST">
      <p>ブログタイトル :</p>
      <input type="text" name="title">
      <p>ブログ本文</p>
      <textarea name="content" id="content" cols="30" rows="10"></textarea>
      <input type="submit" value="送信">
  </form>
</body>

</html>