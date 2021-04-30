<?php
$member = [
  "kona" => 180,
  "seira" => 159,
  "mai" => 160
];

foreach ($member as $name => $height) {
  echo $name . "の身長は" . $height . "です！";
}