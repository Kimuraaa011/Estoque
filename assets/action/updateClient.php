<?php

require '../../config.php';
require '../models/UserDbMysql.php';

$id = filter_input(INPUT_GET, 'id');
if($id){
  $userDb = new UserDbMysql($pdo);
  $user = $userDb->findById($id);
}

?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Espaço Maravilha</title>


</head>

<body>
  <div class="container">
    <form action="../action/updateClientAction.php" method="POST">
      <input type="hidden" name='id' value='<?=$user->getId()?>'>
      <label>
        Nome: <br>
        <input type="text" class="add" name='nome' value='<?=$user->getNome()?>'>
      </label> <br> <br>
      <label>
        Celular: <br>
        <input type="text" class="add" name="celular" value='<?=$user->getCelular()?>'>
      </label> <br> <br>
      <label>
        Email: <br>
        <input type="email" class="add" name="email" value='<?=$user->getEmail()?>'>
      </label> <br> <br>
      <input type="submit" placeholder="Enviar">

    </form>
  </div>

</body>


</html>