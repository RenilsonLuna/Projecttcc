<!DOCTYPE html>
<html>
  <head lang="pt-br">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cadastre-se</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/cadastro.css">
	</head>
  <body>

    <header class="bg-light">
      <figure class="d-flex justify-content-center">
          <img class="" src="../imgs/img_pgn/logotipo.png" width="150">
      </figure>

    </header>
    <nav class="navbar navbar-expand-lg navbar-light nave">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav container col-5">
                <a class="nav-item nav-link anav ativo" href="../index.php">Inicio</a>
                <a class="nav-item nav-link anav" href="sobre_nos.html">Sobre-nós</a>
                <a class="nav-item nav-link anav" href="contato.php">Contate-nos</a>
            </div>
        </div>
    </nav>
		<main class="container d-flex justify-content-center bg-light shadow-sm rounded my-3">
			<div class="content">
				<h1 class="text-center my-3">Cadastre-se</h1>

				<form class="formulario form-group d-sm-block" action="../controle/cadastroControle.php" method="POST" enctype="multipart/form-data">

          <div class="radios ml-3 mb-4">
            <h4>Tipo</h4>
            <div class="form-check col-6">
              <input class="form-check-input" type="radio" name="tipo" id="usuario" value="Usuario" checked>
              <label class="form-check-label" for="usuario">
                Usuario
              </label>
            </div>
            <div class="form-check col-6">
              <input class="form-check-input" type="radio" name="tipo" id="instituicao" value="Instituicao">
              <label class="form-check-label" for="instituicao">
                Instituição
              </label>
            </div>
          </div>

          <label class="col-md-5">  Nome <input class="form-control" type="text" name="nome" placeholder="Digite o nome da instituição" required> </label>
          <label class="col-md-6"> E-mail <input class="form-control" type="email" name="email" placeholder="usuario@usuario.com" required> </label>
          <div>
            <label class="col-md-5 float-left" id="cpf"> CPF/CNPJ <input type="text" class="form-control" name="cpf" placeholder="*Digite apenas números">
            <?php if (isset($_GET['erro']) && $_GET['erro'] == 4) { echo '<div class="alert alert-danger col-4 text-center shadow" id="alerta" role="alert">
              Digite um CPF/CNPJ válido!
            </div>'; } ?>
          </div>
          </label>
          <label class="col-md-6"> CEP <input type="text" onblur="getDadosCep(this.value)" name="cep" placeholder="*Digite apenas numeros" class="form-control" required> </label>

          <?php if (isset($_GET['erro'])) {

            switch($_GET['erro']){
                case 2:
                  echo '<div class="alert alert-danger col-4 text-center shadow" id="alerta" role="alert">
                    Este Usuário já existe!
                  </div>';
                  break;
                case 3:
                  echo '<div class="alert alert-danger text-center shadow" id="alerta" role="alert">
                    Preencha todos os campos e adicione uma imagem.
                  </div>';
                break;
                case 6:
                  echo '<div class="alert alert-danger text-center shadow" id="alerta" role="alert">
                    Formato de imagem não permitido
                  </div>';
                  break;
              }
            } ?>

          <label class="col-md-6"> Endereço <input id="logadouro" disabled class="form-control" type="text" name="endereco" value="Endereço"> </label>
          <label class="col-md-5"> Bairro <input id="bairro" disabled class="form-control" type="text" name="bairro" value="Bairro"> </label>
          <label class="col-md-6"> Cidade <input id="cidade" disabled class="form-control" type="text" name="cidade" value="Cidade"> </label>
          <label class="col-md-5"> Estado <input id="estado" disabled class="form-control" type="text" name="estado" value="Estado"> </label>

          <label class="col-md-5 float-left">Senha<input class="form-control" type="password" name="senha" placeholder="Digite sua senha" required></label>

          <div>
            <label class="col-md-6">Confirmação de Senha
              <input class="form-control" name="conf" type="password" placeholder="Confirme sua senha" required>
              <?php if (isset($_GET['erro']) && $_GET['erro'] == 5) { echo '<small class="text-danger">As senhas precisam ser iguais!</small>'; } ?>
            </label>
          </div>


          <div class="col-6 img_perfil">
            <h5>Foto de perfil</h5>

            <div class="mb-3 d-flex img-group" id="img-group">

              <figure class="figures">
                <img id="img_usuario" class="perfil" width="150" alt="imagem com 150px">
              </figure>

              <figure class="figures">
                <img id="img_usuario2" class="perfil p2" width="100" alt="imagem com 100px">
              </figure>

              <figure class="figures">
                <figcaption></figcaption>
                <img id="img_usuario3" class="perfil p3" width="50" alt="imagem com 50px">
              </figure>

            </div>

            <input type="file" id="img_perfil" class="form-control" name="img_perfil">
            <label for="img_perfil">
              <p class="btn btn-danger"><img src="../icones/img_icon.png" alt="icone img" width="20" class="mr-2">Selecionar imagem</p>
            </label>

          </div>
          <div class="submit d-flex justify-content-center">
            <input type="submit" name="btn_cadastrar" value="Enviar" class="btn text-light col-2">
          </div>

        </form>
			</div>
		</main>

    <footer class="page-footer mt-3">
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

    <script type="text/javascript" src="../js/cadastro.js"></script>
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
