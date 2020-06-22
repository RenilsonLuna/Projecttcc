<script src="../js/desaparece.js" charset="utf-8"></script>

<header class="log container col-12 py-2" style="background-color: white;">

  <figure class="row justify-content-center">
    <img class="" width="150" src="../../tcc/imgs/img_pgn/logotipo.png">
  </figure>

  <?php if(!$auth) { ?>
    <div class="login">
      <form class="" method="post" action="../../tcc/controle/loginControle.php">
        <input class="input-login m-2" placeholder="Usuário" type="email" id="" name="email">
        <br>
        <input class="input-login m-2" placeholder="Senha" type="password" id="" name="senha">
        <a href="../paginas/cadastro.php" class="aform ml-2">Cadastre-se já</a>
        <input class="btnlogin ml-3" type="submit" value="Entrar">
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

</header>

<nav class="navbar navbar-expand-lg navbar-light nave">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav container col-5">
            <a class="nav-item nav-link anav ativo" href="../../tcc/index.php">Inicio</a>
            <a class="nav-item nav-link anav" href="../../tcc/paginas/sobre_nos.php">Sobre nós</a>
            <a class="nav-item nav-link anav" href="../../tcc/paginas/contato.php">Contate-nos</a>
              <?php if ($auth) { ?>

                <a class="nav-item nav-link anav" href="../../tcc/paginas/criarEvento.php">Criar Evento</a>
                <a class="nav-item nav-link anav" href="../../tcc/paginas/perfil.php">
                  Perfil
                </a>

              <?php } ?>
        </div>
        <?php if ($auth) { ?>
          <a href="../../tcc/controle/logoutControle.php" class="text-light text-right btn-sair btn btn-danger">Sair</a>
        <?php } ?>
    </div>
</nav>
