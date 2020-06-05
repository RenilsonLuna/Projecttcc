<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Contate-nos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/contato.css">
  </head>
  <body>
    <header class="container col-12 py-2" style="background-color: white;">
        <figure class="row justify-content-center">
            <img class="" src="../imgs/img_pgn/logotipo.png">
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
                <a class="nav-item nav-link anav" href="paginas/sobre_nos.html">Sobre-nós</a>
                <a class="nav-item nav-link anav" href="contato.php">Contate-nos</a>
                  <a class="nav-item nav-link anav" href="#">
                    Perfil
                  </a>
            </div>
              <a href="controle/logoutControle.php" class="text-light text-right btn-sair btn btn-danger">Sair</a>
        </div>
    </nav>
    <!-- HEADER E NAV -->

    <!-- corpo -->

    <main class="container-fluid py-4">

      <form class="conteudo py-5 col-6 my-5 shadow">
        <h1 class="text-center">Contate-nos</h1>
        <label for="assunto" class="col">
          <h5>Assunto</h5>
          <input id="assunto" type="text" name="assunto" class="form-control">
        </label>

        <label for="mensagem" class="col">
          <h5>Mensagem</h5>
          <textarea id="mensagem" type="text" name="mensagem" class="form-control" cols="40" rows="5"></textarea>
        </label>
        <div class="enviar d-flex justify-content-center pt-3">
          <input class="btn btn-enviar" type="submit" name="btn-enviar" value="Enviar">
        </div>
      </form>

    </main>


    <!-- corpo -->

    <!-- FOOTER -->
    <footer class="page-footer footer-page">
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
