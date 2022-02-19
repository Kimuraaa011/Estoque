<?php

require '../../config.php';
require '../models/UserDbMysql.php';

$userDb = new UserDbMysql($pdo);
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$cel = filter_input(INPUT_POST, 'celular');


if($nome && $email && $cel){
  $user = new User();
  $user->setNome($nome);
  $user->setEmail($email);
  $user->setCelular($cel);
  $userDb->addUser($user);

  header('Location: clientes.php');
  exit();
}