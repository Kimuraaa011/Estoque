<?php

require_once '../../config.php';
require_once '../classes/Product.php';


class ProductDbMysql implements ProductDb{
  private $pdo;

  public function __construct(PDO $engine)
  {
    $this->pdo = $engine;
  }


  public function addProduct(Product $p){
    $sql = ($this->pdo)->prepare('INSERT INTO produto (nome, price, qtd_estoque, cor, tamanho,
    categoria) values (:nome, :price, :estoque, :cor, :tamanho, :categoria)');
    $sql->bindValue(':nome', $p->getNome());
    $sql->bindValue(':price', $p->getPrice());
    $sql->bindValue(':estoque', $p->getEstoque());
    $sql->bindValue(':cor', $p->getCor());
    $sql->bindValue(':tamanho', $p->getTamanho());
    $sql->bindValue(':categoria', $p->getCategoria());
    $sql->execute();
  }

  public function updateProduct(Product $p){
    $sql = ($this->pdo)->prepare('UPDATE produto
    set nome = :nome, price = :price, cor = :cor, qtd_estoque = :estoque,
    tamanho = :tamanho, categoria = :categoria WHERE id = :id');
    $sql->bindValue(':id', $p->getId());
    $sql->bindValue(':nome', $p->getNome());
    $sql->bindValue(':price', $p->getPrice());
    $sql->bindValue(':cor', $p->getCor());
    $sql->bindValue(':estoque', $p->getEstoque());
    $sql->bindValue(':tamanho', $p->getTamanho());
    $sql->bindValue(':categoria', $p->getCategoria());
    $sql->execute();
  }

  public function findProductById($id){
    $sql = ($this->pdo)->query('SELECT * FROM produto WHERE id =' . $id);
    if($sql->rowCount() > 0){
      $data = $sql->fetch(PDO::FETCH_ASSOC);
      $product = new Product();
      $product->setId($data['id']);
      $product->setNome($data['nome']);
      $product->setPrice($data['price']);
      $product->setEstoque($data['qtd_estoque']);
      $product->setCor($data['cor']);
      $product->setTamanho($data['tamanho']);
      $product->setCategoria($data['categoria']);
      
      return $product;
    }
    else{

      return false;

    }
  }

  public function findAll(){
    $array = [];
    $sql = ($this->pdo)->query("SELECT * FROM produto");
    if($sql->rowCount() > 0){

      $data = $sql->fetchAll(PDO::FETCH_ASSOC);

      foreach($data as $item){

        $product = new Product();
        $product->setId($item['id']);
        $product->setNome($item['nome']);
        $product->setPrice($item['price']);
        $product->setEstoque($item['qtd_estoque']);
        $product->setCor($item['cor']);
        $product->setTamanho($item['tamanho']);
        $product->setCategoria($item['categoria']);
        $array[] = $product;
      }
      
      return $array;
    }
  }

}