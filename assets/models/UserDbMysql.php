<?php

require '../classes/User.php';


class UserDbMysql implements UserDb{
  private $pdo;

  public function __construct(PDO $engine)
  {
    $this->pdo = $engine;
  }



  public function findById($i){
    $sql = ($this->pdo)->query('SELECT * FROM cliente WHERE id = ' . $i);
    if($sql->rowCount() > 0){
      $data = $sql->fetch(PDO::FETCH_ASSOC);
      $user = new User();
      $user->setId($data['id']);
      $user->setNome($data['nome']);
      $user->setEmail($data['email']);
      $user->setCelular($data['celular']);
      
      return $user;

    }
  }

  public function findAll(){
    $array = [];
    $sql = ($this->pdo)->query('SELECT * FROM cliente');
    if($sql->rowCount() > 0){
      $data  = $sql->fetchAll(PDO::FETCH_ASSOC);
      foreach($data as $item){
        $user = new User();
        $user->setId($item['id']);
        $user->setNome($item['nome']);
        $user->setEmail($item['email']);
        $user->setCelular($item['celular']);
        $array[] = $user;
      }
      return $array;
    }



  }

  public function findByEmail($e){


  }

  public function findByCelular($c){


  }

  public function addUser(User $u){
    $sql = ($this->pdo)->prepare('INSERT INTO cliente (nome, email, celular) values (:nome, :email, :celular)');
    $sql->bindValue(':nome', $u->getNome());
    $sql->bindValue(':email', $u->getEmail());
    $sql->bindValue(':celular', $u->getCelular());
    $sql->execute();

    $u->setId(($this->pdo)->lastInsertId());
    return $u;

  }

  public function update(User $u){
    $sql = ($this->pdo)->prepare('UPDATE cliente
    set nome = :nome, email = :email, celular = :cel
    WHERE id = :id' );
    $sql->bindValue(':id', $u->getId());
    $sql->bindValue(':nome', $u->getNome());
    $sql->bindValue(':email', $u->getEmail());
    $sql->bindValue(':cel', $u->getCelular());
    $sql->execute();

  }

  public function delete($i){


  }


}