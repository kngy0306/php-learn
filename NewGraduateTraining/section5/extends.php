<?php

abstract class ProductAbstract
{
  public function echoProduct()
  {
    echo '親クラスです';
  }
}

// 子クラス
class Product extends ProductAbstract
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
}

$instance = new Product("コーヒー");

$instance->getProduct();