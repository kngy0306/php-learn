<?php
$myName = "kona";

function test()
{
  echo "testです";
}

function getComment($str)
{
  echo $str . "です";
}

test();
getComment($myName);

function getNumber()
{
  return 5;
}
$numberReceiver = getNumber();
echo $numberReceiver;