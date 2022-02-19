<?php

require '../../config.php';
require '../classes/Product.php';
require '../classes/Category.php';


class ProductDbMysql implements ProductDb{
  private $pdo;

  public function __construct(PDO $engine)
  {
    $this->pdo = $engine;
  }


  public function addProduct(Product $p, Category $c){
    $sql = ($this->pdo)->prepare('INSERT INTO produto (nome, price, qtd_estoque,
    categoria) values (:nome, :price, :estoque, :categoria)');
    $sql->bindValue(':nome', $p->getNome());
    $sql->bindValue(':price', $p->getPrice());
    $sql->bindValue(':estoque', $p->getEstoque());
    $sql->bindValue(':categoria', $c->getId());
    $sql->execute();
  }

  public function updateProduct(Product $p){

  }

  public function deleteProduct($id){

  }

  public function findProductById($id){

  }

  public function findAll(){

  }

}