<?php



session_start();

require_once '../../config.php';
require_once '../models/CategoryDbMysql.php';
require_once '../models/ProductDbMysql.php';

$id = filter_input(INPUT_GET, 'id');

if($id){
  $productDb = new ProductDbMysql($pdo);
  $categoria = new CategoriaDbMysql($pdo);
  $lista = $categoria->findAll();
  $produto = $productDb->findProductById($id);
}




?>


<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Editar Produto</title>


</head>

<body>
  <div class="container">
    <form action="../action/updateProductAction.php" method="POST">
      <input type="hidden" name='id' value='<?=$produto->getId()?>'>
      <label>
        Nome: <br>
        <input type="text" class="add" value="<?=$produto->getNome()?>" name='nome'>
      </label> <br> <br>
      <label>
        Preço: <br>
        <input type="text" class="add" value="<?=$produto->getPrice()?>" name="price">
      </label> <br> <br>
      <label>
        Cor: <br>
        <input type="text" class="add" value="<?=$produto->getCor()?>" name="cor">
      </label> <br> <br>
        Quantidade em estoque: <br>
        <input type="text" class="add" value="<?=$produto->getEstoque()?>" name="estoque">
      </label> <br> <br>
      <label>
        Tamanho: <br>
        <select name="tamanho">">
          <option value="U" <?= ($produto->getTamanho() === 'U') ? 'selected': '' ?> >U - Único</option>
          <option value="P" <?= ($produto->getTamanho() === 'P') ? 'selected': '' ?> >P - Pequeno</option>
          <option value="M" <?= ($produto->getTamanho() === 'M') ? 'selected': '' ?> >M - Médio</option>
          <option value="G" <?= ($produto->getTamanho() === 'G') ? 'selected': '' ?>>G - Grande</option>
          <option value="GG" <?= ($produto->getTamanho() === 'GG') ? 'selected': '' ?>>GG - Extra Grande</option>          
        </select> <br> <br>
      <label>
        Categoria: <br>
        <select name="categoria">
          <?php foreach($lista as $categoria): ?>
            <option value="<?= $categoria->getId()?>" <?= ($categoria->getId() === $produto->getCategoria()) ? 'selected' : '' ?> ><?= $categoria->getNome() ?></option>
          <?php endforeach; ?>
        </select>
      </label> <br> <br>
      <input type="submit" placeholder="Enviar"> <br> <br>

    </form>
    <?php 
    
      if(isset($_SESSION['updateProductWarn'])){
        echo '<h3 style="color: red;">' . $_SESSION['updateProductWarn'] . '</h3>';
        $_SESSION['updateProductWarn'] = '';
      } 
    ?>
  </div>

</body>


</html>