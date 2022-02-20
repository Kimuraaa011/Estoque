<?php

session_start();

require_once '../../config.php';
require_once '../models/CategoryDbMysql.php';

$categoria = new CategoriaDbMysql($pdo);
$lista = $categoria->findAll();

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
        Cor: <br>
        <input type="text" class="add" name="cor">
      </label> <br> <br>
        Quantidade em estoque: <br>
        <input type="text" class="add" name="estoque">
      </label> <br> <br>
      <label>
        Tamanho: <br>
        <select name="tamanho">
          <option value="U">U - Único</option>
          <option value="P">P - Pequeno</option>
          <option value="M">M - Médio</option>
          <option value="G">G - Grande</option>
          <option value="GG">GG - Extra Grande</option>          
        </select> <br> <br>
      <label>
        Categoria: <br>
        <select name="categoria">
          <?php foreach($lista as $categoria): ?>
            <option value="<?= $categoria->getId()?>"><?= $categoria->getNome() ?></option>
          <?php endforeach; ?>
        </select>
      </label> <br> <br>
      <input type="submit" placeholder="Enviar"> <br> <br>

    </form>
    <?php 
    
      if(isset($_SESSION['addProductWarn'])){
        echo '<h3 style="color: red;">' . $_SESSION['addProductWarn'] . '</h3>';
        $_SESSION['addProductWarn'] = '';
      } 
    ?>
  </div>

</body>


</html>