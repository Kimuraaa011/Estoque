<?php

require '../../config.php';
require '../models/UserDbMysql.php';



$id = filter_input(INPUT_GET, 'id');
if($id){
  $userDb = new UserDbMysql($pdo);
  $user = $userDb->findById($id);
}
else{
  header('Location: clientes.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="../css/details.css">
  <title>Detalhes do Cliente</title>


</head>

<body>
  <div class="container">
    <div class="cliente">
      <h2>Dados do Cliente:</h2>
      <table>
        <tr class="first">
          <th>Nome</th>
          <th>Celular</th>
          <th>Email</th>
          <th>Opções</th>
        </tr>
        <tr>
          <td><?=$user->getNome()?></td>
          <td><?=$user->getCelular()?></td>
          <td><?=$user->getEmail()?></td>
          <td><a href="../action/updateClient.php?id=<?=$id?>"><button>Editar</button></a></td>
        </tr>
      </table> 
    </div>
    <div class="compras">
      <!-- Todas as compras realizadas pelo cliente -->
    </div>
    <div class="divida">
      <!-- todas as dividas do cliente, caso exista -->
    </div>
  </div>


</body>


</html>