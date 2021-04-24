<?php

use Dotenv\Dotenv;

require 'vendor/autoload.php';

// .envからAPI_KEYを読み込むための準備
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$baseurl = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/";
$keyword = "蒲田";

$params = [
  "key" => $_ENV["API_KEY"],
  "format" => "json",
  "keyword" => $keyword,
  "count" => 1,
];

$url = $baseurl . "?" . http_build_query($params, "", "&");

$result = file_get_contents($url);

// jsonを連想配列へ
$res = json_decode($result, true);

print_r($res["results"]["shop"][0]);