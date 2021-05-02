<?php

trait shibataTrait
{
  public function getProduct()
  {
    echo 'プロダクト';
  }
}

trait matsumuraTrait
{
  public function getNews()
  {
    echo 'ニュース';
  }
}

class Nogi
{

  use shibataTrait;
  use matsumuraTrait;

  public function getInformation()
  {
    echo 'クラスです';
  }
}

$product = new Nogi();

$product->getInformation();
$product->getNews();
$product->getProduct();