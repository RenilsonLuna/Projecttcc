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
        <div class="login position-absolute d-flex justify-content-end">
            <form class="" method="post" action="controle/loginControle.php">
                <input class="input-login m-2" placeholder="Usuário" type="text" id="" name=""><br>
                <input class="input-login m-2" placeholder="Senha" type="password" id="" name="">
                <a href="" class="aform ml-2">Cadastre-se já</a>
                <input class="btnlogin ml-5" type="submit" value="Entrar">
            </form>
        </div>
        <?php if(isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
        <div class="alert alert-danger col-md-3 col-sm-6 loginAlert" role="alert" id="alerta">
            <h5>Usuário ou senha incorretos!</h5>
        </div>
        <?php } ?>
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
                <a class="nav-item nav-link anav ativo" href="index.html">Inicio</a>
                <a class="nav-item nav-link anav" href="sobre_nos.html">Sobre-nós</a>
                <a class="nav-item nav-link anav" href="#">Contate-nos</a>
                <a class="nav-item nav-link anav" href="#">Perfil</a>
            </div>
        </div>
    </nav>


    <div class="center">
        <div class="toptop">
            <div class="d-inline-block justify-content-start">
                <div class="input-group search ">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Button</button>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block ">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filtrar por
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something</a>
                </div>
            </div>

        </div>

        <div class="card float-left">
            <img src="imgs/img_pgn/shutterstock_652925827.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h3 class="card-title mb-1">Card title</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                    the card's content. Some quick example text to build on the card title and make up the bulk of
                    the card's content.</p>
                <a href="#" class="btn btn-card">Ver mais</a>
            </div>
        </div>

        <div class="card float-left  ">
            <img src="imgs/img_pgn/shutterstock_652925827.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h3 class="card-title mb-1">Card title</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                    the card's content. Some quick example text to build on the card title and make up the bulk of
                    the card's content.</p>
                <a href="#" class="btn btn-card">Ver mais</a>
            </div>
        </div>

        <div class="card float-left  ">
            <img src="imgs/img_pgn/shutterstock_652925827.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h3 class="card-title mb-1">Card title</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                    the card's content. Some quick example text to build on the card title and make up the bulk of
                    the card's content.</p>
                <a href="#" class="btn btn-card">Ver mais</a>
            </div>
        </div>


        <div class="row container-fluid justify-content-center mt-5">
            <div class="btn btn-plus">Carregar mais</div>
        </div>

    </div>

    <div class="footer-page footer1 mt-3">
        <div class="justify-content-center container-fluid row">
            <a class="icon m-3" href=""></a>
            <a class="icon m-3" href=""></a>
            <a class="icon m-3" href=""></a>
            <a class="icon m-3" href=""></a>
        </div>
    </div>

    <div class="footer2 footer-page">
        <div class="justify-content-center container-fluid row">
            <p class="copyright pt-3">© Copyright 2020 Weact - All Rights Reserved</p>
        </div>
    </div>

    <script type="text/javascript">
        const alerta = document.getElementById('alerta');
        setTimeout(() => {
          alerta.style = "visibility: hidden";
        }, 5000);

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

</body>

</html>
