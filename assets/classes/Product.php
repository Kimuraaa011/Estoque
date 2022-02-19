<?php

require '../classes/Category.php';


class Product{
  private $id;
  private $nome;
  private $price; 
  private $estoque;
  private $categoria;


  public function getId(){
    return $this->id;
  }

  public function setId($i){
    $this->id = $i;
  }

  public function getNome(){
    return $this->nome;
  }

  public function setNome($n){
    $this->nome = $n;
  }

  public function getPrice(){
    return $this->price;
  }

  public function setPrice($p){
    $this->price = $p;
  }

  public function getEstoque(){
    return $this->estoque;
  }

  public function setEstoque($e){
    $this->estoque = $e;
  }

  public function getCategoria(){
    return $this->categoria;
  }

  public function setCategoria($c){
    $this->categoria = $c;
  }


}


interface ProductDb{
  public function addProduct(Product $p, Category $c);
  public function updateProduct(Product $p, Category $c);
  public function deleteProduct($id);
  public function findProductById($id);
  public function findAll();

}


