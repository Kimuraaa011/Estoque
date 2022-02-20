<?php




class Product{
  private $id;
  private $nome;
  private $price; 
  private $cor;
  private $tamanho;
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

  public function getCor(){
    return $this->cor;
  }

  public function setCor($c){
    $this->cor = $c;
  }

  public function getTamanho(){
    return $this->tamanho;
  }

  public function setTamanho($t){
    $this->tamanho = $t;
  }


}


interface ProductDb{
  public function addProduct(Product $p);
  public function updateProduct(Product $p);
  public function findProductById($id);
  public function findAll();

}


