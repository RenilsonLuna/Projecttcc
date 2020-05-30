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

		<main class="container d-flex justify-content-center bg-light shadow-sm rounded my-3">
			<div class="content">
				<h1 class="text-center my-3">Cadastre-se</h1>

				<form class="formulario form-group d-sm-block" action="../controle/cadastroControle.php" method="post">

          <div class="radios ml-3 mb-4">
            <h4>Tipo</h4>
            <div class="form-check col-6">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
              <label class="form-check-label" for="exampleRadios1">
                Usuario
              </label>
            </div>
            <div class="form-check col-6">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
              <label class="form-check-label" for="exampleRadios2">
                Instituição
              </label>
            </div>
          </div>

          <label class="col-md-5">  Nome <input class="form-control" type="text" name="nm_usuario" placeholder="Digite o nome da instituição"> </label>
          <label class="col-md-6">  CNPJ  <input class="form-control" type="text" name="CNPJ"  placeholder="*Digite apenas números">  </label>
          <label class="col-md-7"> CPF <input type="text" class="form-control" name="cpf" placeholder="*Digite apenas números"> </label>
          <label class="col-md-4"> CEP <input type="text" onblur="getDadosCep(this.value)" name="" placeholder="*Digite apenas numeros" class="form-control"> </label>
          <label class="col-md-9"> E-mail <input class="form-control" type="email" name="email" placeholder="usuario@usuario.com"> </label>

          <?php if (isset($_GET['erro']) && $_GET['erro'] == 3) { ?>
            <div class="alert alert-danger col-4 text-center shadow" id="alerta" role="alert">
              Preencha todos os campos!
            </div>
          <?php  } ?>

          <label class="col-md-7"> Endereço <input id="logadouro" disabled class="form-control" type="text" name="endereco" value="Endereço" > </label>
          <label class="col-md-4"> Bairro <input id="bairro" disabled class="form-control" type="text" name="bairro" value="Bairro" > </label>
          <label class="col-md-7"> Cidade <input id="cidade" disabled class="form-control" type="text" name="cidade" value="Cidade" > </label>
          <label class="col-md-4"> Estado <input id="estado" disabled class="form-control" type="text" name="estado" value="Estado" > </label>
          <label class="col-md-5">Senha <input class="form-control" type="password" name="Senha" placeholder="Digite sua senha"></label>
          <label class="col-md-5">Senha <input class="form-control" type="password" name="Senha" placeholder="Confirme sua senha"></label>

          <div class="col-6 img_perfil">
            <h5>Foto de perfil</h5>
            <div class="mb-3 d-flex img-group" id="img-group">
              <figure class="figures">
                <figcaption>150px</figcaption>
                <img id="img_usuario" class="perfil" width="150">
              </figure>
              <figure class="figures">
                <figcaption>100px</figcaption>
                <img id="img_usuario2" class="perfil p2" width="100">
              </figure>
              <figure class="figures">
                <figcaption>50px</figcaption>
                <img id="img_usuario3" class="perfil p3" width="50">
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

    <script type="text/javascript">

        const input = document.getElementById("img_perfil")
        const img = document.getElementById("img_usuario")
        const img2 = document.getElementById("img_usuario2")
        const img3 = document.getElementById("img_usuario3")
        const alert = document.getElementById('alerta')

        setTimeout(function(){
          alert.style = "display: none"
        }, 3000)

        input.addEventListener('change', function() {

          const file = this.files[0]
          const fileReader = new FileReader()

          fileReader.onloadend = () => {
            img.setAttribute('src', fileReader.result)
            img2.setAttribute('src', fileReader.result)
            img3.setAttribute('src', fileReader.result)
          }
          fileReader.readAsDataURL(file)
        })

        function getDadosCep(cep){

    			const url = `https://viacep.com.br/ws/${cep}/json/unicode/`;
    			const ajax = new XMLHttpRequest();
    			ajax.open('GET', url);
    			ajax.onreadystatechange = () => {

    				if (ajax.readyState == 4 && ajax.status == 200) {
    					const dadosText = ajax.responseText;
    					const dadosJson = JSON.parse(dadosText);

              document.getElementById('cidade').value = dadosJson.localidade;
    					document.getElementById('estado').value = dadosJson.uf;
    					document.getElementById('bairro').value = dadosJson.bairro;
    					document.getElementById('logadouro').value = dadosJson.logradouro;
    				}
    			}
    			ajax.send();
    		}

    </script>
	</body>
</html>
