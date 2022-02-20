<?php

require 'config.php';
require 'assets/models/ProductDbMysql.php';


$productDb = new ProductDbMysql($pdo);
$products = $productDb->findAll();

foreach($products as $product){
  echo $product->getNome() . '<br>';
  

}
