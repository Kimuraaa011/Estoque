<?php


class Categoria{
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

interface CategoriaDb{
  public function findAll();
  public function findById($id);

}