<script src="../js/desaparece.js" charset="utf-8"></script>

<header class="log container col-12 py-2" style="background-color: white;">

    <!-- BUSCAR USUARIO -->

  <!-- <form class="" action="../../tcc/index.php?" method="GET">
    <input type="text" class="input-search col-10 py-1" name="q" placeholder="Buscar usuário ou instituição" id="nome">
    <span class="input-group-btn">
      <button class="btn btn-default input-btn" type="submit">
        <i class="fas fa-search mb-1"></i>
      </button>
    </span>
  </form> -->

  <figure class="row justify-content-center">
    <img class="" width="150" src="../../tcc/imgs/img_pgn/logotipo.png">
  </figure>

  <?php if(!$auth) { ?>
    <div class="login">
      <form class="" method="post" action="../../tcc/controle/loginControle.php">
        <input class="input-login m-2" placeholder="Usuário" type="email" id="" name="email">
        <br>
        <input class="input-login m-2" placeholder="Senha" type="password" id="" name="senha">
        <a href="../../tcc/paginas/cadastro.php" class="aform ml-2">Cadastre-se já</a>
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

      <form class="form-userS d-flex" action="../../tcc/paginas/buscarUsuarios.php" method="get">
        <input type="search" class="form-control rounded-pill" name="q" value="" placeholder="procure por usuários">
        <span class="input-group-btn">
          <button class="btn btn-default input-btn" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </span>
      </form>

      <div class="navbar-nav container col-5">

            <a class="nav-item nav-link anav ativo" href="../../tcc/index.php">Inicio</a>
            <a class="nav-item nav-link anav" href="../../tcc/paginas/sobre_nos.php">Sobre nós</a>
            <a class="nav-item nav-link anav" href="../../tcc/paginas/contato.php">Contate-nos</a>
              <?php if ($auth) { ?>

                <a class="nav-item nav-link anav" href="../../tcc/paginas/criarEvento.php">Criar Evento</a>
                <a class="nav-item nav-link anav" href="../../tcc/paginas/perfil.php">
                  Perfil
                </a>

                <?php if (isset($_SESSION['usuario'])): ?>
                  <?php if (isset($tipoU) && $tipoU == 'adm'): ?>
                    <a class="nav-item nav-link anav" href="../../tcc/paginas/feedbacks.php">Feedbacks</a>
                  <?php endif; ?>
                <?php endif; ?>

              <?php } ?>
        </div>
        <?php if ($auth) { ?>
          <a href="../../tcc/controle/logoutControle.php" class="text-light text-right btn-sair btn btn-danger">Sair</a>
        <?php } ?>
    </div>
</nav>
