<header class="container col-12 py-2" style="background-color: white;">
    <figure class="row justify-content-center">
        <img class="" src="../imgs/img_pgn/logotipo.png">
    </figure>
    <?php if(!$auth) { ?>

      <div class="login">
          <form class="" method="post" action="../controle/loginControle.php">
              <input class="input-login m-2" placeholder="Usuário" type="email" id="" name="email"><br>
              <input class="input-login m-2" placeholder="Senha" type="password" id="" name="senha">
              <a href="paginas/cadastro.php" class="aform ml-2">Cadastre-se já</a>
              <input class="btnlogin ml-5" type="submit" value="Entrar">
          </form>
      </div>
    <?php } ?>
</header>

<nav class="navbar navbar-expand-lg navbar-light nave">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav container col-5">
            <a class="nav-item nav-link anav ativo" href="../index.php">Inicio</a>
            <a class="nav-item nav-link anav" href="../paginas/sobre_nos.html">Sobre nós</a>
            <a class="nav-item nav-link anav" href="contato.php">Contate-nos</a>
              <?php if ($auth) { ?>

                <a class="nav-item nav-link anav" href="perfil.php">
                  Perfil
                </a>

              <?php } ?>
        </div>
        <?php if ($auth) { ?>
          <a href="../controle/logoutControle.php" class="text-light text-right btn-sair btn btn-danger">Sair</a>
        <?php } ?>
    </div>
</nav>
