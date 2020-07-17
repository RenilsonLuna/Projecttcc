<?php
require "controle/homeControle.php";
?>
<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Weact</title>
</head>

<body style="background-color: #e7e7e7;">


    <!-- <header class="container col-12 py-2" style="background-color: white;">

      <?php if(!$auth) { ?>

        <div class="login">
            <form class="" method="post" action="controle/loginControle.php">
                <input class="input-login m-2" placeholder="Usuário" type="email" id="" name="email"><br>
                <input class="input-login m-2" placeholder="Senha" type="password" id="" name="senha">
                <a href="paginas/cadastro.php" class="aform ml-2">Cadastre-se já</a>
                <input class="btnlogin ml-5" type="submit" value="Entrar">
            </form>
        </div>

      <?php } ?>

      <?php if(isset($_GET['erro']) && !$auth) {

        switch($_GET['erro']){
            case 1:
              echo '<div class="alert alert-danger col-md-4 col-lg-2 col-sm-4 text-center" role="alert" id="alerta">
                <h5>Usuário ou senha incorretos!</h5></div>';
              break;
            case 2:
              echo '<div class="alert alert-danger col-md-4 col-lg-2 col-sm-4 text-center" role="alert" id="alerta">
                <h5>Preencha todos os campos!</h5></div>';
              break;
            }
        }
        ?>

        <figure class="d-flex justify-content-center">
            <img class="" width="150" src="imgs/img_pgn/logotipo.png">
        </figure>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light nave">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav container col-5">
                <a class="nav-item nav-link anav ativo" href="index.php">Inicio</a>
                <a class="nav-item nav-link anav" href="paginas/sobre_nos.php">Sobre nós</a>
                <a class="nav-item nav-link anav" href="paginas/contato.php">Contate-nos</a>

                <?php if($auth){ ?>

                  <a class="nav-item nav-link anav" href="paginas/criarEvento.php">Criar Evento</a>
                  <a class="nav-item nav-link anav" href="#">
                    Perfil
                  </a>
              <?php } ?>
            </div>
            <?php if($auth) { ?>
              <a href="controle/logoutControle.php" class="text-light text-right btn-sair btn btn-danger">Sair</a>
            <?php } ?>
        </div>
    </nav>
    </div> -->

    <?php include "paginas/header.php" ?>

    <?php if (isset($_GET['rec']) && $_GET['rec'] == 'passados'): ?>
      <a href="index.php" class=" p-2 px-3 btn btn-success">...Voltar aos recentes</a>
    <?php else: ?>
      <a href="index.php?rec=passados" class="btn btn-primary">Ver eventos passados...</a>
    <?php endif; ?>

        <main class="container-fluid" id="main">

          <div class="toptop d-md-flex justify-content-center">
            <div class="mr-5 mb-3">
              <div class="input-group">
                <form class="" action="index.php" method="GET">

                  <input type="text" class="input-search col-10 py-1" name="q" placeholder="Buscar evento..." id="nome">
                  <span class="input-group-btn">
                    <button class="btn btn-default input-btn" type="submit">
                      <i class="fas fa-search mb-1"></i>
                    </button>
                  </span>

                </form>
              </div>
            </div>
            <?php if ($auth): ?>

              <div class="">
                <a class="btn-mais p-2 mr-3" href="paginas/criarEvento.php">Criar evento <i class="fas fa-plus"></i></a>
              </div>

            <?php endif; ?>
          </div>

          <div class="content d-flex justify-content-center ">

            <div class="eventos row justify-content-center col-8">

              <?php foreach ($e as $key => $v): ?>
                <?php if ($counter >= 6){ continue; } ?>
                <div class="card float-left shadow" style="width: 20rem;">
                    <img src="imgs/img_eventos/<?= $v->cd_img_evento ?>" class="card-img-top" alt="Imagem do evento">

                      <!-- NOME E FOTO DO CRIADOR (unecessary) -->
                      <!-- <img src="imgs/img_perfis/<?= $usuario->recUsuario($v->cd_criador_evento)['cd_img_perfil'] ?>" alt="img do criador" class="img-criador m-1 border"> -->
                      <!-- <p class=""> <?= ucfirst($usuario->recUsuario($v->cd_criador_evento)['nm_usuario']) ?> </p> -->


                  <div class="card-body">
                    <h4 class="card-title"><?= substr($v->nm_evento, 0, 20)."..." ?></h4>

                    <p class="card-text"><?= substr($v->ds_evento, 0, 80)."..." ?></p>
                    <p class="card-text text-success">
                      <svg class="icone mb-2" aria-hidden="true" focusable="false" data-prefix="fas"
                      data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img"
                      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15">
                      <path width="30" stroke-width="5" fill="green"
                      d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z">
                      </path></svg>
                       <?= $evento->numParticipantes($v->cd_evento) ?> Participantes</p>
                  </div>
                  <button class="btn" onclick="redirect(<?=
                  $v->cd_evento?>)">Ver mais</button>
                </div>
              <?php $counter++; endforeach; ?>

            </div>
          </div>
        </main>

    </div>

    <?php include "paginas/footer.php" ?>

    <script type="text/javascript">
        const alerta = document.getElementById('alerta');
        setTimeout(() => {
          alerta.style = "visibility: hidden";
        }, 5000);

        function redirect(id){
          window.location.href = `./paginas/eventos.php?id=${id}`;
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
    <script src="js/all.js" charset="utf-8"></script>
    <script src="js/carregarMais.js" charset="utf-8"></script>
</body>
</html>
