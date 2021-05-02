<?php

class Product
{

  // 変数
  private $product = [];

  // 関数
  function __construct($product)
  {
    $this->product = $product;
  }

  public function getProduct()
  {
    echo $this->product;
  }
}

$instance = new Product("コーヒー");

$instance->getProduct();