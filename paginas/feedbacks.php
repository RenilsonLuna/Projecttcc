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

    <main class="container px-0">

        <h1>Feedbacks</h1>

        <?php foreach ($fed as $f): ?>
        <div class="feedbacks mt-4 py-2">


          <div class="content d-flex">

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

            <label>
              <h5>Mensagem</h5>
              <textarea rows="5" cols="60" disabled><?= $f->cd_mensagem ?></textarea>
            </label>

          </div>
        </div>

      <?php endforeach; ?>

    </main>


    <?php include "footer.php" ?>

    <!-- JS -->
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
