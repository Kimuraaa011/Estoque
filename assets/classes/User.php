<?php

class User {
  private $id;
  private $nome;
  private $email;
  private $celular;

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
  public function getEmail(){
    return $this->email;
  }

  public function setEmail($e){
    $this->email = $e;
  }
  public function getCelular(){
    return $this->celular;
  }

  public function setCelular($c){
    $this->celular = $c;
  }

  
}


interface UserDb{
  public function findById($i);
  public function findAll();
  public function findByEmail($e);
  public function findByCelular($c);
  public function addUser(User $u);
  public function update(User $u);
  public function delete($i);
  

}