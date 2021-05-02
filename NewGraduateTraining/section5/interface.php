<?php

interface firstGenerationMember
{
  public function getFirst();
}

interface secondGenerationMember
{
  public function getSecond();
}

// 子クラス
class Product implements firstGenerationMember, secondGenerationMember
{
  // 変数
  private $product = [];

  // 関数
  function __construct($product)
  {
    $this->product = $product;
  }

  // override
  public function getProduct()
  {
    echo $this->product;
  }

  public static function getStaticProduct($str)
  {
    echo $str;
  }

  public function getFirst()
  {
    echo '一期生';
  }

  public function getSecond()
  {
    echo '二期生';
  }
}

$instance = new Product("コーヒー");

$instance->getProduct();
$instance->getFirst();