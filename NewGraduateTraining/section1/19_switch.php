<?php
// switch文は == で比較しているので、
// 厳密な比較をしたいときは ↓

$data = "1";

switch ($data) {
  case $data === 1:
    echo "1です";
    break;
  case 2:
    echo "2です";
    break;
  default:
    echo "当てはまりません";
}