<?php require "../controle/perfilControle.php"; ?>
<!DOCTYPE html>
<html lang="br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@500&display=swap" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link href="../css/all.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../css/perfil.css" type="text/css">
        <link rel="icon" href="../imgs/logotipo.ico" />
        <title>Weact</title>
    </head>

<body>

<?php include "header.php"; ?>

<div class="center" id="centro">
    <div class="perfil">

        <div class="row rowc d-flex justify-content-between">
            <p class="txtp"><?= $tipo ?></p>
            <div></div>
            <?php if (isset($_SESSION['usuario'])): ?>
              <?php if ($perfilUser == $_SESSION['usuario']): ?>
                <button class="btn-mais" onclick="editar()">
                  Editar perfil
                </button>
              <?php endif; ?>
            <?php endif; ?>
        </div>

            <div class="row rowc col-12">
                <figure class="imgp mr-3">
                    <img src="../imgs/img_perfis/<?= $usuario->cd_img_perfil ?>" alt="Imagem de perfil">
                </figure>
                <div class="dados col-8">

              <table class="table" id="campos">
                <tr>
                  <td id="nome"><span class="spanDestaque">Nome: </span> <?= ucfirst($usuario->nm_usuario) ?></td>
                  <td><span class="spanDestaque">Email: </span> <?= $usuario->cd_email_usuario ?> </td>
                  <td><span class="spanDestaque">CPF/CNPJ: </span> <?= $usuario->cd_cpf_cnpj ?> </td>
                </tr>
                <tr>
                  <td> <span class="spanDestaque">CEP: </span> <span id="cep"> <?= $usuario->cd_cep_usuario ?> </span> </td>
                  <td id="cidade"></td>
                  <td id="estado"></td>
                </tr>
                <tr>
                  <td id="bairro"></td>
                  <td id="logadouro"></td>
                </tr>
              </table>
            </div>

            <div class="row rowc d-flex justify-content-between">
                <div class="ev1">
                    <h5>Seus Eventos</h5>
                </div>
                <div class="ev2">
                    <h5>Participando</h5>
                </div>
            </div>

            <div class="row rowc d-flex justify-content-between">
              <div class="eventos row rowc">

          <?php if ($usuario->cd_tipo_usuario == 'adm' || $usuario->cd_tipo_usuario == 'emp'): ?>
              <?php foreach ($seuEvento as $evento): ?>

                    <div class="evp">
                        <figure class="figevp">
                            <a href="eventos.php?id=<?= $evento['cd_evento'] ?>">
                              <img src="../imgs/img_eventos/<?= $evento['cd_img_evento'] ?>" alt="imagem do evento">
                              <figcaption class="txtvp"><?= substr($evento['nm_evento'], 0, 20) . "..."; ?></figcaption>
                            </a>
                        </figure>
                    </div>

              <?php endforeach; ?>
            <?php else: ?>
              <h5 class="text-primary text-center p-3">É necessário ser uma instituição para ter eventos...</h5>
            <?php endif; ?>
            </div>

                <div class="eventos row rowc">

                  <?php foreach ($eventoArray as $key => $val): ?>
                    <div class="evp">
                        <figure class="figevp">
                          <a href="eventos.php?id=<?= $eventoArray[$key][0]->cd_evento ?>">
                            <img src="../imgs/img_eventos/<?= $eventoArray[$key][0]->cd_img_evento ?>" alt="imagem do evento">
                            <figcaption class="txtvp"><?= substr($eventoArray[$key][0]->nm_evento, 0, 20) . "..."; ?></figcaption>
                          </a>
                        </figure>

                        <div class="txtevp">

                        </div>
                    </div>
                  <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<form class="shadow p-5 hide" action="../controle/editarPerfil.php" method="post" id="form">

  <button type="button" id="close" class="close" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

  <label for="nome">
    Nome
    <input class="form-control" type="text" name="nome" id="nome" placeholder="Atual: <?= $usuario->nm_usuario ?>">
  </label>
  <label for="cep">
    CEP
    <input class="form-control" type="text" name="cep" id="cep" placeholder="Atual: <?= $usuario->cd_cep_usuario ?>">
  </label>
  <div>
    <input class="" type="checkbox" name="check" id="check" onclick="checkbox()">
    Alterar senha
  </div>
  <label for="senha hide">
    <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha">
  </label>
  <label for="conf hide">
    <input class="form-control" type="password" name="conf" id="conf" placeholder="confirmar senha">
  </label>
  <button type="submit" name="btnEnviar" class="btn btn-success mt-3">Editar</button>
</form>

<?php include "footer.php"; ?>

<script type="text/javascript">

window.onload = function (){

  const end = document.getElementById('cep')
  const cep = end.innerText
  const url = `https://viacep.com.br/ws/${cep}/json/unicode/`;
  const ajax = new XMLHttpRequest();
  ajax.open('GET', url);
  ajax.onreadystatechange = () => {

    if (ajax.readyState == 4 && ajax.status == 200) {
      const dadosText = ajax.responseText;
      console.log(dadosText)
      const dadosJson = JSON.parse(dadosText);

      console.log(dadosJson);
      document.getElementById('cidade').innerText = dadosJson.localidade;
      document.getElementById('estado').innerText = dadosJson.uf;
      document.getElementById('bairro').innerText = dadosJson.bairro;
      document.getElementById('logadouro').innerText = dadosJson.logradouro;
    }
  }
  ajax.send();
}

function toggleCamp(){
  form.classList.toggle('hide')
  campos.classList.toggle('hide')
  centro.classList.toggle('blur')
}

function editar(){
  toggleCamp()
  checkbox()
  btnClose = document.getElementById('close')
  btnClose.addEventListener('click', toggleCamp)

}

function checkbox(){
    const c = document.getElementById('check')
    if (c.checked) {
      senha.classList.remove('hide')
      conf.classList.remove('hide')
    }else{
      senha.value = ""
      conf.value = ""
      senha.classList.add('hide')
      conf.classList.add('hide')
    }
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
    <script src="all.js"></script>
</body>
