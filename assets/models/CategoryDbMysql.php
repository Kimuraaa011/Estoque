<?php

require '../../config.php';
require '../classes/Category.php';


class CategoryDbMysql implements CategoryDb{
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
        $category = new Category();
        $category->setId($item['id']);
        $category->setNome($item['nome']);
        $array[] = $category;
      }
      return $array;

    }

  }


}