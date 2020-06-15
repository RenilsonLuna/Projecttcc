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
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Weact</title>
</head>

<body style="background-color: #e7e7e7;">


    <header class="container col-12 py-2" style="background-color: white;">

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

        <figure class="row justify-content-center">
            <img class="" src="imgs/img_pgn/logotipo.png">
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
                <a class="nav-item nav-link anav" href="paginas/sobre_nos.html">Sobre nós</a>
                <a class="nav-item nav-link anav" href="paginas/contato.php">Contate-nos</a>

                <?php if($auth){ ?>
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


      </div>

        <main class="container-fluid d-md-flex justify-content-center" id="main">
            <?php foreach ($e as $key => $v): ?>

              <div class="card" style="width: 20rem;">
                <img src="imgs/img_eventos/<?= $v->cd_img_evento ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title"><?= $v->nm_evento ?></h4>
                  <p class="card-text"><?= $v->ds_evento ?></p>
                </div>
                <button class="btn" onclick="redirect(<?=
                $v->cd_evento?>)">Ver mais</button>
              </div>

            <?php endforeach; ?>
        </main>


        <div class="d-flex container-fluid justify-content-center mt-5">
            <div class="btn btn-plus" id="btn-carregar" onclick="load()">Carregar mais</div>
        </div>

    </div>

    <footer class="page-footer footer-page mt-3">
        <div class="justify-content-center container-fluid d-flex">
            <a class="icon m-3" href=""></a>
            <a class="icon m-3" href=""></a>
            <a class="icon m-3" href=""></a>
            <a class="icon m-3" href=""></a>
        </div>
        <div class="justify-content-center container-fluid d-flex">
            <p class="copyright pt-3">© Copyright 2020 Weact - All Rights Reserved</p>
        </div>
    </footer>

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

    <script src="js/carregarMais.js" charset="utf-8"></script>
</body>
</html>
