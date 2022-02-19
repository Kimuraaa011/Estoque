<?php

require '../../config.php';
require '../models/CategoryDbMysql.php';

$category = new CategoryDbMysql($pdo);
$lista = $category->findAll();

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
    <form action="../action/addProductAction.php" method="POST">
      <label>
        Nome: <br>
        <input type="text" class="add" name='nome'>
      </label> <br> <br>
      <label>
        Preço: <br>
        <input type="text" class="add" name="price">
      </label> <br> <br>
      <label>
        Quantidade em estoque: <br>
        <input type="text" class="add" name="estoque">
      </label> <br> <br>
      <label>
        Categoria: <br>
        <select name="categoria">
          <?php foreach($lista as $categoria): ?>
            <option value="<?= $categoria->getId()?>"><?= $categoria->getNome() ?></option>
          <?php endforeach; ?>
        </select>
      </label> <br> <br>
      <input type="submit" placeholder="Enviar">

    </form>
  </div>

</body>


</html>