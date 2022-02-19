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
    <form action="../action/addClientAction.php" method="POST">
      <label>
        Nome: <br>
        <input type="text" class="add" name='nome'>
      </label> <br> <br>
      <label>
        Celular: <br>
        <input type="text" class="add" name="celular">
      </label> <br> <br>
      <label>
        Email: <br>
        <input type="email" class="add" name="email">
      </label> <br> <br>
      <input type="submit" placeholder="Enviar">

    </form>
  </div>

</body>


</html>