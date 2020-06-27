<?php require "../controle/eventoControle.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Evento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/evento.css">
  </head>
  <body>
    <?php include "header.php" ?>

      <?php if (isset($_GET['id'])): ?>

        <div  class="jumbotron">
          <img class="img-jumbotron" src="../imgs/img_eventos/<?= $evento->cd_img_evento ?>" alt="imagem do evento">
        </div>

        <main class="container-fluid mb-3">

        <figure class="col-12 col-sm-12">
          <img src="../imgs/img_eventos/<?= $evento->cd_img_evento ?>" class="img-evento positionImg" alt="imagem do evento">
        </figure>

        <div class="content border rounded px-5 py-3 shadow-sm col-12 col-sm-12">

          <div class="criador col-12">
            <?php if (isset($_SESSION['usuario'])): ?>

              <!-- EDITAR EVENTO  -->
              <!-- <?php if ($userCreator): ?>
                <div class="editar d-flex">
                  <button id="btnEditar" class="border-bottom">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/>
                    <path stroke="black" stroke-width="1" fill="green" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                  </svg>
                  Editar
                  </button>
                </div>
              <?php endif; ?> -->

            <?php endif; ?>
            <small class="text-center d-flex justify-content-center mb-2">Criado por:</small>
            <div class="nome-criador py-1 text-center">
              <a href="perfil.php?usuario=<?= $dadosUser['cd_usuario'] ?>" class="btn">
                <img src="../imgs/img_perfis/<?= $dadosUser['cd_img_perfil'] ?>" alt="imagem do criador" class="img-criador">
                <?= ucfirst($dadosUser['nm_usuario'])?>
              </a>
              <hr class="text-center bg-success">
            </div>

          </div>

          <h1><?= $evento->nm_evento ?></h1>
          <div class="data-local">

            <div class="">
              <div class="part d-flex">

              <small id="participantes" onclick="mostrarParticipantes()">
                <svg class="icone mb-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path stroke="red" stroke-width="5" fill="orange" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                <?= $n ?> Participantes
              </small><br>

              <div class="col-8 my-2 hideParts" id="partList">
                <ul class="list-group">
                  <?php for ($i=0; $i < 6; $i++) { ?>

                    <?php if ($i < 5){ ?>
                      <li class="list-group-item col-5">
                        <a href="perfil.php?usuario=<?= $participantes[$i][0]->cd_usuario ?>" class="text-dark nav-link">
                          <img src="../imgs/img_perfis/<?= $participantes[$i][0]->cd_img_perfil ?>" class="rounded mr-2" width="30" alt="img perfil participante">
                          <?= $participantes[$i][0]->nm_usuario; ?>
                        </a>
                      </li>
                    <?php }else{ ?>
                      <li class="list-group-item col-5">Mais <?= count($participantes)-5 ?> participante(s)...</li>
                    <? } ?>

                  <?php } ?>
                </ul>
              </div>
            </div>
              <small><img src="../icones/localizacao.png" class="icone mb-2"> <?= $evento->cd_endereco_evento ?></small><br>
              <small> <img src="../icones/hora.png" class="icone mr-2"><?= $evento->dt_evento ?> às <?= $evento->hr_evento ?>h</small>
          </div>

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
            <?php if (!$participante): ?>
              <button class="btn bttn border" type="button" name="participar" onclick="participar(<?= $evento->cd_evento ?>)">Participar</button>
            <?php else: ?>
              <h5 class="alert alert-primary border text-center">Você está participando</h5>
              <button class="cancelar btn btn-secondary" onclick="cancelar(<?= $evento->cd_evento ?>)" type="button" name="cancelar participação">Cancelar participação</button>
            <?php endif; ?>
          <?php else: ?>
            <h5 class="alert alert-danger border text-center">Faça login para participar do evento</h5>
          <?php endif; ?>

        </div>

      <?php else: header('location: ../index.php')?>
      <?php endif; ?>
    </main>

    <?php include "footer.php" ?>

    <script type="text/javascript">
    let estado = 'ativo'
    function mostrarParticipantes(){
      console.log(partList.classList.toggle("hideParts"));
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="../js/participar.js" charset="utf-8"></script>

  </body>
</html>
