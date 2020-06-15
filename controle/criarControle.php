<?php
require "../vendor/autoload.php";

$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();
$handler = new \ByJG\Session\JwtSession($sessionConfig);

include "authControle.php";

use Classes\Usuario;
use Classes\Evento;
use Classes\Database;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);
$evento = new evento($conn);

// action for submit botton
if (isset($_POST['btn-enviar']))
{

  $criador = $_SESSION['usuario'];
  $nome = $_POST['nome'];
  $dt = $_POST['data'];
  $local = $_POST['local'];
  $hr = $_POST['hora'];
  $ds = $_POST['descricao'];
  $requisitos = $_POST['requisitos'];

  // verificando campos vazios
  if (empty($criador) || empty($nome) || empty($dt) || empty($local) || empty($hr) || empty($ds) || empty($requisitos)) {
    header('location: ../paginas/criarEvento.php?erro=1');
    return false;
  }



  $img = $_FILES['img_evento'];

  // verificando img vazia
  if (empty($img)) {
    header('location: ../paginas/criarEvento.php?erro=3');
    return false;
  }

  // verificando extensao
  // pegando nome temporario obrigatorio (php)
  $formatosPermitidos = array('png', 'jpg', 'jpeg');
  $extensao = pathinfo($img['name'], PATHINFO_EXTENSION);
  $newName = uniqid().".".$extensao;

  if (in_array($extensao, $formatosPermitidos)) {
    $caminho = '../imgs/img_eventos/';
    $temporario = $img['tmp_name'];

    // verificando erro no upload da imagem
    if(!move_uploaded_file($temporario, $caminho.$newName)) {
      header('location: ../paginas/criarEvento.php?erro=5');
    }

  }
  echo "<pre>";
  print_r($_POST);
  print_r($_SESSION);
  // criando evento
  var_dump($evento->criarEvento($nome, $criador, $dt, $ds, $hr, $local, $newName, $requisitos));

}
