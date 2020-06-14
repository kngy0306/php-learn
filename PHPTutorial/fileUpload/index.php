<?php
  if (isset($_POST['submit'])) {
    echo "<pre>"; // preformatted text
    print_r($_FILES);
    
    // basename -> pathの最後の要素だけ取得する
    $targetFile = "uploads/" . basename($_FILES['attachment']['name']);
    // pathinfo(path, 四つの分類(extension, basename等々))
    $extension = pathinfo($targetFile, PATHINFO_EXTENSION);

    if($_FILES['attachment']['size'] > 500000)
      echo "Your file is too big!";
    else if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg')
      echo "Only the image files are allowed!";
    else if (file_exists($targetFile))
      echo 'File with this name is already exist<br>';
    else if (move_uploaded_file($_FILES['attachment']['tmp_name'], $targetFile))
      echo 'File Uploaded';
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP File Upload</title>
</head>

<body>
  <form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="attachment"> <br>
    <input type="submit" value="Upload" name="submit">
  </form>
</body>

</html>