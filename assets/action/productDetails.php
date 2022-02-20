<?php 

require_once '../../config.php';
require_once '../models/CategoryDbMysql.php';
require_once '../models/ProductDbMysql.php';

$productDb = new ProductDbMysql($pdo);
$categoria = new CategoriaDbMysql($pdo);
$produtos = $productDb->findAll();


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
    <h2>Listagem de Produtos: </h2>
    <table>
      <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade em estoque</th>
        <th>Cor</th>
        <th>Tamanho</th>
        <th>Categoria</th>
        <th>Opções</th>
      </tr>
      <?php foreach($produtos as $produto): ;?>
        <tr>
          <td><?= $produto->getNome() ?></td>
          <td><?= $produto->getPrice() ?></td>
          <td><?= $produto->getEstoque() ?></td>
          <td><?= $produto->getCor() ?></td>
          <td><?= $produto->getTamanho() ?></td>
          <td><?= $categoria->findById($produto->getCategoria()) ?></td>
          <td><a href="../action/updateProduct.php?id=<?=$produto->getId()?>"><button>Editar</button></a></td>
        </tr>

      <?php endforeach; ?>
    </table>
  </div>


</body>


</html>