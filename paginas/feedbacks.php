<?php require "../controle/feedbackControle.php" ?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="../imgs/logotipo.ico" />
    <title>Feedbacks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link href="../css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/feedbacks.css">
  </head>
  <body>

    <?php include "header.php" ?>


    <div class="tab list-group">
      <a href="feedbacks.php?rec=fb" class="btn btn-primary">Feedbacks</a>
      <a href="feedbacks.php?rec=den" class="btn btn-primary">Denuncias</a>
    </div>
    <main class="container px-0 my-3">
        <?php if (!isset($_GET['rec']) || $_GET['rec'] == 'fb'): ?>

          <h1 class="mb-3">Feedbacks</h1>
          <?php foreach ($fed as $f): ?>

            <div class="feedbacks py-2 shadow">
              <div class="content d-md-flex">
                <div class="deletar" onclick="show(popFb)">
                  <img src="../icones/lixeira.png" alt="deletar Feedback" width="30">
                </div>

                <div class="campos mr-3">
                  <div class="mb-4">
                    <h5>Usuário</h5>
                    <input type="text" value="<?= $f->cd_usuario ?> - <?= $usuario->recDadoUsuario($f->cd_usuario, 'nm_usuario'); ?> " disabled>
                  </div>

                  <div>
                    <h5>Assunto</h5>
                    <input type="text" value="<?= $f->nm_assunto ?>" disabled>
                  </div>
                </div>

                <div>
                  <h5>Mensagem</h5>
                  <textarea rows="5" cols="60" disabled><?= $f->cd_mensagem ?></textarea>
                </div>
              </div>

            </div>
            <div class="shadow p-5 pop-over hide rounded" id="popFb">
              <h4 class="text-center mb-3">Tem certeza que deseja apagar este feedback?</h4>
              <div class="d-flex justify-content-between mx-auto col-6">
                <button onclick="deletarFb(<?= $f->cd_feedback ?>)" class="btn btn-danger">Deletar</button>
                <button onclick="hide(popFb)" class="btn btn-secondary">Deletar</button>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>


        <!-- denuncias -->

        <?php if (isset($_GET['rec']) && $_GET['rec'] == 'den'): ?>

          <h1 class="mb-3">Denuncias</h1>
          <div class="row justify-content-left">
          <?php foreach ($den as $d): ?>

            <div class="card float-left" style="min-width: 18rem;">

              <div class="deletar-den mt-2 ml-2 col">
                <img onclick="show(popDen)" src="../icones/lixeira.png" alt="deletar Feedback" width="30" class="float-left mr-2">
                <h5 class="card-title">Denuncia <?= $d->cd_denuncia ?></h5>
              </div>

              <div class="card-body">
                <img class="card-img-top rounded mb-2 shadow-sm" src="../imgs/img_eventos/praia.jpeg" alt="Imagem do evento denunciado">
                <p><?= $evento->recDadoEvento($d->cd_evento, 'nm_evento') ?></p>
                <div class="border-left pl-2 mb-2 border-primary">
                  <h5><?= $usuario->recDadoUsuario($d->cd_usuario, "nm_usuario") ?></h5>
                  <p class="card-text"><?= $d->nm_assunto_denuncia ?></p>
                </div>
                <a href="#" class="card-link">Ver evento</a>
              </div>
            </div>


            <div class="shadow p-5 pop-over hide rounded position-fixed" id="popDen">
              <h4 class="text-center mb-3">Tem certeza que deseja apagar este feedback?</h4>
              <div class="d-flex justify-content-between mx-auto col-6">
                <button onclick="deletarDen(<?= $d->cd_denuncia ?>)" class="btn btn-danger">Deletar</button>
                <button onclick="hide(popDen)" class="btn btn-secondary">Cancelar</button>
              </div>
            </div>

          <?php endforeach; ?>
        </div>

        <?php endif; ?>

        <!-- denuncias -->

    </main>


    <?php include "footer.php" ?>

    <!-- JS -->
    <script type="text/javascript">

      function show(obj){
        obj.classList.remove('hide')
      }

      function hide(obj){
        obj.classList.add('hide')
      }

      function deletarFb(id){
        window.location.href = `../controle/feedbackControle.php?deletarFb=${id}`
      }

      function deletarDen(id){
        window.location.href = `../controle/feedbackControle.php?deletarDen=${id}`
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
    <script src="all.js"></script>
  </body>
</html>
