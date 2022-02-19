<?php

require 'config.php';
require 'assets/models/UserDbMysql.php';


$userDb = new UserDbMysql($pdo);
$users = $userDb->findAll();

foreach($users as $user){
  echo $user->getNome() . '<br>';
  

}
