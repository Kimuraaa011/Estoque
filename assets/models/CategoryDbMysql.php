<?php

require_once '../../config.php';
require_once '../classes/Category.php';


class CategoriaDbMysql implements CategoriaDb{
  private $pdo;

  public function __construct(PDO $engine)
  {
    $this->pdo = $engine;
  }


  public function findAll(){
    $array = [];
    $sql = ($this->pdo)->query('SELECT * FROM categoria');
    if($sql->rowCount() > 0){
      $data = $sql->fetchAll(PDO::FETCH_ASSOC);
      foreach($data as $item){
        $categoria = new Categoria();
        $categoria->setId($item['id']);
        $categoria->setNome($item['nome']);
        $array[] = $categoria;
      }
      return $array;

    }

  }
  public function findById($id){
    $sql = ($this->pdo)->query('SELECT * FROM categoria WHERE id='. $id);
    if($sql->rowCount() > 0){
      $data = $sql->fetch(PDO::FETCH_ASSOC);

      return $data['nome'];
    }
    else{
      return false;
    }

  }


}