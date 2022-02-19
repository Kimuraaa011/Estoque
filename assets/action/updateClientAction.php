<?php

require '../../config.php';
require '../models/UserDbMysql.php';


$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$celular = filter_input(INPUT_POST, 'celular');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


if($nome && $celular && $email){
  $userDb = new UserDbMysql($pdo);
  $user = new User();
  $user->setId($id);
  $user->setNome($nome);
  $user->setEmail($email);
  $user->setCelular($celular);
  $userDb->update($user);
  header('Location: details.php');
  exit;

}else{
  header('Location: details.php?id='.$id);
  exit;
}