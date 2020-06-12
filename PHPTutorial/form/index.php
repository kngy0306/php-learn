<?php
$msg = "";

if (isset($_POST["submit"])) {
  $name = $_POST["username"];
  $email = $_POST["email"];
  $message = $_POST["body"];

  if (strlen($name) < 3) {
    $msg = "<font color='red'>Please check your name...</font>";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = "<font color='red'>Please check your email..</font>";
  } else if (strlen($message) < 10) {
    $msg = "<font color='red'>Message is too short...</font>";
  } else {
    $msg = "<font color='green'>Your data id looking good. Sending an email!</font>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPForm</title>
</head>

<body>
  <form action="index.php" method="post">
    <input type="text" name="username" id="" placeholder="Name..."><br>
    <input type="email" name="email" id="" placeholder="Email..."><br>
    <textarea name="body" id="" cols="30" rows="10" placeholder="Message..."></textarea><br>
    <input type="submit" value="Send Email" name="submit">
  </form>
  <p>
    <?php echo $msg; ?>
  </p>
</body>

</html>