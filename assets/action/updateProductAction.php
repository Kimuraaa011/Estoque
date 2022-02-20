<?php

session_start();

require_once '../../config.php';
require_once '../models/ProductDbMysql.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$price = filter_input(INPUT_POST, 'price');
$cor = filter_input(INPUT_POST, 'cor');
$estoque = filter_input(INPUT_POST, 'estoque');
$tamanho = filter_input(INPUT_POST, 'tamanho');
$categoria = filter_input(INPUT_POST, 'categoria');

if(strpos($price, ',') != false){
  $price = (float) str_replace(',', '.', $price);
}


if($id && $nome && $price && $estoque){
  $productDb = new ProductDbMysql($pdo);
  $product = new Product();
  $product->setId($id);
  $product->setNome($nome);
  $product->setPrice($price);
  $product->setCor($cor);
  $product->setEstoque($estoque);
  $product->setTamanho($tamanho);
  $product->setCategoria($categoria);
  $productDb->updateProduct($product);

  header('Location: productDetails.php');
  exit;

}else{
  $_SESSION['updateProductWarn'] = 'Ocorreu um erro, tente atualizar novamente!';
  header('Location: updateProduct.php');
  exit;
}

