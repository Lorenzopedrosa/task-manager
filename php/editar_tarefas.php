<?php
  include("./db/conexao.php");

  // Caso o usuário não esteja logado, redireciona para o index
  include('./db/verificar_login.php');

  $id_task = $_GET['id_task'];

  // Pegando os dados da tarefa para inserir automaticamente no formulário
  $query = "SELECT * FROM task where id_task = '$id_task'";
  $result = mysqli_query($conexao, $query);
  $tarefa = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager - Editar Tarefas</title>

  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="../img/favicon.ico">

  <!-- jQuery para contar caracteres -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- jQuery para contar caracteres -->

</head>
<body style="position: relative; background-color: var(--principal);">

  <div id="pop-up" class="editar-tarefa" style="margin: 60px 0;">
    <h1>Editar tarefa</h1>
    <form action="./db/edit_tarefas.php" method="POST">
        
        <div class="input-wrapper">
          <label for="title">Título</label>
          <input type="text" name="title" value = "<?= $tarefa['title_task']?>">

        </div>

        <div class="input-wrapper" style="position: relative;">
          <label for="description">Descrição</label>
          <textarea id="description" name="description" maxlength="250" cols="30" rows="10"><?= $tarefa['description_task']?></textarea>
          <div class="contador-de-caracteres" style="background-color: white; color: var(--principal); position: absolute; bottom: 10px; right: 10px; font-size: 14px;"><span class="caracteres">250</span> caracteres restantes</div>
        </div>
        <div class="input-wrapper">
          <label for="date">Data</label>
          <input type="date" name="date" value = "<?= $tarefa['date_task']?>">
        </div>

        <div class="input-wrapper">
          <label for="time">Hora</label>
          <input type="time" name="time" value = "<?= $tarefa['time_task']?>">
        </div>
        
        <div class="input-wrapper" style="display: none; overflow: hidden; opacity: 0;">
          <label for="date">ID_task</label>
          <input type="text" name="id_task" value = "<?= $tarefa['id_task']?>">
        </div>

        <a href="../dashboard.php" class="sair">Voltar</a>
        <button type="submit">Editar</button>

    </form>
  </div>
  
  <!-- Contador de caracteres -->
  <script text="javascript">
    $(document).on("input", "#description", function () {
    var caracteresRestantes = 250;
    var caracteresDigitados = parseInt($(this).val().length);
    var caracteresRestantes = caracteresRestantes - caracteresDigitados;

    $(".caracteres").text(caracteresRestantes);
    });
  </script>
  <!-- Contador de caracteres -->

  
</body>
</html>