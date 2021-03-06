<?php

session_start();

require_once '../../config.php';
require_once '../models/ProductDbMysql.php';

$nome = filter_input(INPUT_POST, 'nome');
$price = filter_input(INPUT_POST, 'price');
$estoque = filter_input(INPUT_POST, 'estoque');
$cor = filter_input(INPUT_POST, 'cor');
$tamanho = filter_input(INPUT_POST, 'tamanho');
$categoria = filter_input(INPUT_POST, 'categoria');

if(strpos($price, ',') != false){
  $price = (float) str_replace(',', '.', $price);
}

if($nome && $price && $estoque && $categoria){
  $pd = new ProductDbMysql($pdo);
  $product = new Product();
  $product->setNome($nome);
  $product->setPrice($price);
  $product->setEstoque($estoque);
  $product->setCor($cor);
  $product->setTamanho($tamanho);
  $product->setCategoria($categoria);
  $pd->addProduct($product);

  header('Location: productDetails.php');
  exit;
}
else{
  $_SESSION['addProductWarn'] = 'Lembre-se de preencher todos os campos!';
  header('Location: addProduct.php');
  exit;
}