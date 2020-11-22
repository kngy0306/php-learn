<?php
class hoge
{
  private $_val;

  public function serVal($v)
  {
    $this->_val = $v;
  }
  public function getVal()
  {
    return $this->_val;
  }
}

$obj = new hoge();
$obj->serVal('test');
var_dump($obj->getVal());