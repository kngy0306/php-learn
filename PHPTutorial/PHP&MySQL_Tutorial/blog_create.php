<?php
require_once('blog.php');

$blogs = $_POST;

if (empty($blogs['title'])) {
  exit('タイトルを入力してください');
}
if (mb_strlen($blogs['title']) > 191) {
  exit('タイトルは191文字以内にしてください');
}

if (empty($blogs['content'])) {
  exit('本文を入力してください');
}

if (empty($blogs['category'])) {
  exit('カテゴリーを選択してください');
}

if (empty($blogs['publish_status'])) {
  exit('公開、非公開を選択してください');
}

$blog = new Blog();
$blog->blogCreate($blogs);