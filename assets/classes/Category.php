<?php


class Category{
  private $id;
  private $nome;

  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function getNome(){
    return $this->nome;
  }
  public function setNome($n){
    $this->nome = $n;
  }

  
}

interface CategoryDb{
  public function findAll();
}