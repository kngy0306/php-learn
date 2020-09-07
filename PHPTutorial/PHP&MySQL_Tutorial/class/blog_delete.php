<?php
require_once('blog.php');

$blog = new Blog();
$blog->delete($_GET['id']);
?>

<p><a href="../front/index.php">戻る</a></p>