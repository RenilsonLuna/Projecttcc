<?php

require "../vendor/autoload.php";
$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();

$handler = new \ByJG\Session\JwtSession($sessionConfig);
 include "../controle/authControle.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style-sobrenos.css" rel="stylesheet" type="text/css">
        <link href="all.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/all.css" type="text/css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" href="../imgs/logotipo.ico" />
        <title>Weact</title>
    </head>

<body>

    <?php include "header.php"; ?>

    <div class="center">
        <div class="jumbotron jumbotron-fluid sobre-nos">
            <div class="container">
                <h3 class="display-4">Sobre nós</h3>
            </div>
        </div>
        <div class="d-md-flex sn">
            <div class="sn1">
                <h4 class="mt-4">Missão</h4>
                <figure><img src="../imgs/img_pgn/missao.png" alt="" style="width: 50px; height: 50px;"></figure>
                <p>Fazer com que nossos usuários encontrem sempre os eventos que melhor lhes convém.</p>
            </div>

            <div class="sn1">
                <h4 class="mt-4">Visão</h4>
                <figure><img src="../imgs/img_pgn/visao.png" alt="" style="width: 50px; height: 50px;" ></figure>
                <p>Satisfazer os usuários com <br>sua experiência em nosso site.</p>
            </div>

            <div class="sn1">
                <h4 class="mt-4">Valores</h4>
                <figure><img src="../imgs/img_pgn/valores.png" alt="" style="width: 50px; height: 50px;"></figure>
                <ul>
                  <li>Satisfazer o usuário</li>
                  <li>Ajudar a sociedade</li>
                  <li>Manter integridade e respeito </li>
                </ul>
            </div>
        </div>

        <div class="qs d-flex rowc">
            <div class="qs1">
                <h4>Quem somos</h4>
                <p class="mt-4">Grupo de jovens com o intuito de ajudar a fazer da sociedade um lugar mais limpo e fácil de se viver, por meio de eventos caridosos e voluntários.</p>
            </div>
            <div class="qs2">
                <figure ><img src="../imgs/img_pgn/acao.png" alt="ação"></figure>
            </div>
        </div>

        <div class="cns">
            <h4>Conheça nossas causas</h4>
            <p></p>
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
