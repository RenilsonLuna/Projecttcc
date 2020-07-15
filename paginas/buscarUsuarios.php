<?php require "../controle/buscar_usuario_controle.php"; ?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.css">
  </head>
  <body>
      <?php include "header.php"; ?>

        <main class="container py-3">
        <h3 class="mt-5 ml-5">Usuários encontrados: <?= count($users); ?></h3>
        <?php foreach ($users as $u): ?>
            <div class="card float-left" style="width: 18rem;">
              <a href="perfil.php?usuario=<?= $u->cd_usuario ?>" class="nav-link p-0">
                <img class="card-img-top" src="../imgs/img_perfis/<?= $u->cd_img_perfil ?>" alt="Imagem de capa do card">
                <div class="card-body">
                  <p class="card-text text-dark m-0"><?= substr($u->nm_usuario, 0, 20) ?></p>
                  <small><?= tipoUser($u->cd_tipo_usuario) ?></small>
                </div>
              </a>
            </div>

        <?php endforeach; ?>

      </main>

      <?php include "footer.php"; ?>
  </body>
</html>
