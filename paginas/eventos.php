<?php require "../controle/eventoControle.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Evento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/evento.css">
  </head>
  <body>
    <?php include "header.php" ?>

    <div  class="jumbotron">
      <img class="img-jumbotron" src="../imgs/img_eventos/<?= $evento->cd_img_evento ?>" alt="imagem do evento">
    </div>

    <main class="container-fluid mb-3">
      <img src="../imgs/img_eventos/<?= $evento->cd_img_evento ?>" class="img-evento col-12 col-sm-12" alt="imagem do evento">

      <div class="content border rounded px-5 py-3 shadow-sm col-12 col-sm-12">
          <h1><?= $evento->nm_evento ?></h1>
          <div class="data-local">
            <small><img src="../icones/localizacao.png" class="icone mb-2"> <?= $evento->cd_endereco_evento ?></small><br>
            <small> <img src="../icones/hora.png" class="icone mr-2"><?= $evento->dt_evento ?> às <?= $evento->hr_evento ?>h</small>
          </div>

          <div class="descricao mt-4">
            <h2>Descrição</h2>
            <p> <?= $evento->ds_evento ?> </p>
          </div>

          <div class="requisitos">
            <h2>O que Levar?</h2>
            <p><?= $evento->cd_requisitos ?></p>
          </div>

          <?php if ($auth): ?>

            <button class="btn border" type="button" name="participar">Participar</button>
          <?php else: ?>
            <h5 class="alert alert-danger border text-center">Faça login para participar do evento</h5>
          <?php endif; ?>

      </div>
    </main>

    <?php include "footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    
  </body>
</html>
