<?php require "../controle/eventoControle.php" ?>
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

    <div class="jumbotron">
    </div>

    <main class="container-fluid mb-3">
      <img src="../imgs/img_eventos/evento.jpeg" class="img-evento col-12 col-sm-12">

      <div class="content border rounded px-5 py-3 shadow-sm col-12 col-sm-12">
          <h1>Movimento Jacarezinho Pela Paz</h1>
          <div class="data-local">
            <small><img src="../icones/localizacao.png" class="icone mb-2">  Av. Ana Costa, 549 - 105a - Gonzaga, Santos</small><br>
            <small> <img src="../icones/hora.png" class="icone mr-2">23/07 às 13h</small>
          </div>

          <div class="descricao mt-4">
            <h2>Descrição</h2>
            <p>	Lorem ipsum inceptos taciti venenatis cras libero aenean magna lacinia ullamcorper dapibus blandit netus neque aptent,
               dictum class vestibulum cursus suspendisse feugiat potenti a urna porta dolor nam egestas. proin eget risus tristique non ultricies viverra etiam vehicula diam,
               id elementum mi eu faucibus augue fusce pulvinar nulla bibendum, pretium aliquam orci sapien luctus etiam inceptos egestas. </p>
          </div>

          <div class="requisitos">
            <h2>O que Levar?</h2>
            <p>Lorem ipsum inceptos taciti venenatis cras libero aenean magna lacinia ullamcorper dapibus blandit netus neque aptent</p>
          </div>

          <button class="btn border" type="button" name="participar">Participar</button>
      </div>

    </main>

    <?php include "footer.php" ?>
  </body>
</html>
