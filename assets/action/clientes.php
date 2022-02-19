<?php  
  require '../../config.php';
  require '../models/UserDbMysql.php';


  $userDb = new UserDbMysql($pdo);
  $users = $userDb->findAll();


?>


<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="../css/clientes_style.css">
  <title>Espaço Maravilha</title>


</head>

<body>
  <div class="container">
    <table>
      <tr>

        <th>Nome</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Opções</th>

      </tr>
      <?php foreach($users as $user): ?>
        <tr <?= ($user->getId()%2 === 0)? 'class="colorir"' : 'class=""' ?> >
          <td><?= $user->getNome()?></td> 
          <td><?= $user->getCelular()?></td>
          <td><?= $user->getEmail()?></td>
          <td><a href="../action/details.php?id=<?=$user->getId()?>">Detalhes</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>


</body>


</html>