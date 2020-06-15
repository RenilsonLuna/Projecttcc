<?php require "../controle/criarControle.php"; ?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Criar Evento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/criar.css">
  </head>
  <body>
    <?php include "header.php"; ?>

    <main class="container py-4 bg-light shadow-sm rounded my-3">


        <div class="">
          <h2 class="text-center pb-2 text-weight-bold">Criar Evento</h2>
          <?php if ($auth): ?>
          <form class="formulario form-group col-12" action="../controle/criarControle.php" method="POST" enctype="multipart/form-data">

            <label class="col-md-7"> Nome <input class="form-control" type="text" name="nome" placeholder="Digite o nome do evento" > </label>
            <label class="col-md-5"> Data  <input class="form-control text-center" type="date" name="data" ></label>

            <label class="col-md-8"> Local <input class="form-control" type="text" name="local" placeholder="Digite o local e/ou o cep" > </label>

            <label class="col-md-4"> Horario <input class="form-control text-center" type="time" name="hora" ></label>

            <?php if (isset($_GET['uploaded']) && $_GET['uploaded'] == 1): ?>
              <h4 class="alert alert-success shadow" id="alerta">Evento criado com sucesso</h4>
            <?php endif; ?>

            <?php if (isset($_GET['erro'])) {

              switch($_GET['erro']){

                  case 1:
                    echo '<div class="alert alert-danger col-4 text-center shadow" id="alerta" role="alert">
                      Preencha todos os campos!
                    </div>';
                    break;
                  case 3:
                    echo '<div class="alert alert-danger text-center shadow" id="alerta" role="alert">
                      Adicione uma imagem.
                    </div>';
                  break;
                  case 4:
                    echo '<div class="alert alert-danger text-center shadow" id="alerta" role="alert">
                      Formato de imagem não permitido
                    </div>';
                    break;
                  case 5:
                    echo '<div class="alert alert-danger text-center shadow" id="alerta" role="alert">
                      Falha no upload da imagem.
                    </div>';
                    break;
                }
              } ?>

            <?php if (isset($_GET['uploaded']) && $_GET['uploaded'] == 2): ?>
              <h4 class="alert alert-danger shadow"  id="alerta">Erro na criação do evento</h4>
            <?php endif; ?>

            <label class="col-12"> Descrição <textarea class="form-control" name="descricao" rows="5" placeholder="Adicione uma descrição para que entendam seu evento..." ></textarea></label>
            <label class="col-12"> Requisitos <textarea class="form-control" name="requisitos" placeholder="Quais os requisitos para participar?" rows="3"></textarea></label>

            <figure class="col-md-6">
              <figcaption>Foto do evento</figcaption>
              <img id="img_usuario" class="perfil form-control" alt="imagem do evento">
            </figure>

            <input type="file" id="img_evento" class="form-control d-none" name="img_evento">
            <label class="col" for="img_evento" id="img-label">
              <p class="btn btn-danger"><img src="../icones/img_icon.png" alt="icone img" width="20" class="mr-2">Selecionar imagem</p>
            </label>
            <button class="btn-enviar btn" type="submit" name="btn-enviar">Criar evento</button>
          </form>
        <?php else: ?>
          <h2 class="text-danger text-center my-5">Faça login para criar um evento</h2>
        <?php endif; ?>
        </div>
  </main>

    <?php include "footer.php"; ?>

    <script type="text/javascript">

    const input = document.getElementById("img_evento")
    const img = document.getElementById("img_usuario")

    // add img
    input.addEventListener('change', function() {

      const file = this.files[0]
      const fileReader = new FileReader()

      fileReader.onloadend = () => {
        img.setAttribute('src', fileReader.result)
      }
      fileReader.readAsDataURL(file)
    })
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
    <script src="../js/desaparece.js" charset="utf-8"></script>
  </body>
</html>
