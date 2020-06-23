<?php require "../controle/perfilControle.php"; ?>
<!DOCTYPE html>
<html lang="br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link href="../css/all.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../css/perfil.css" type="text/css">
        <title>Weact</title>
    </head>

<body>

<?php include "header.php"; ?>

<div class="center">
    <div class="perfil">

        <div class="row rowc d-flex justify-content-between">
            <p class="txtp"><?= $tipo ?></p>
            <div></div>
            <a class="btn-mais" href="">
                Editar perfil
            </a>
        </div>

            <div class="row rowc">
                <figure class="imgp mr-3">
                    <img src="../imgs/img_perfis/<?= $usuario->cd_img_perfil ?>" alt="Imagem de perfil">
                </figure>
                <div class="dados">

                <p><span class="spanDestaque">Nome:</span> <?= ucfirst($usuario->nm_usuario) ?></p>
                <p><span class="spanDestaque">CPF/CNPJ:</span> <?= $usuario->cd_cpf_cnpj ?></p>
                <p><span class="spanDestaque">CEP:</span> <?= $usuario->cd_cep_usuario ?></p>

              </div>
            </div>

            <div class="row rowc d-flex justify-content-between">
                <div class="ev1">
                    <h5>Seus Eventos</h5>
                </div>
                <div class="ev2">
                    <h5>Participando</h5>
                </div>
            </div>

            <div class="row rowc d-flex justify-content-between">
              <div class="eventos row rowc">

              <?php foreach ($seuEvento as $evento): ?>

                    <div class="evp">
                        <figure class="figevp">
                            <img src="../imgs/img_eventos/<?= $evento['cd_img_evento'] ?>" alt="imagem do evento">
                            <figcaption class="txtvp"><?= substr($evento['nm_evento'], 0, 20) . "..."; ?></figcaption>
                        </figure>
                    </div>

              <?php endforeach; ?>

            </div>

                <div class="eventos row rowc">

                  <?php foreach ($eventoArray as $key => $val): ?>
                    <div class="evp">
                        <figure class="figevp">
                          <img src="../imgs/img_eventos/<?= $eventoArray[$key][0]->cd_img_evento ?>" alt="imagem do evento">
                          <figcaption class="txtvp"><?= substr($eventoArray[$key][0]->nm_evento, 0, 20) . "..."; ?></figcaption>
                        </figure>

                        <div class="txtevp">

                        </div>
                    </div>
                  <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>
</div>

<?php include "footer.php"; ?>
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
