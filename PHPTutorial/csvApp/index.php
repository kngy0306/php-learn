<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSV取り込みサンプル</title>
</head>

<body>
  <form action="csv_import.php" method="post" enctype="multipart/form-data">
    <input type="file" id="csvFile" name="csvFile">
    <input type="submit">
  </form>
</body>

</html>

<?php
var_dump($_FILES["csvFile"]);
?>