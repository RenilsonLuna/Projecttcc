<?php

require "../vendor/autoload.php";

$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();
$handler = new \ByJG\Session\JwtSession($sessionConfig);

// auth
include "authControle.php";

use Classes\Usuario;
use Classes\Database;
use Classes\Evento;
use Classes\Feedback;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);
$evento = new Evento($conn);
$fb = new Feedback($conn);


// participando
if (isset($_GET['participar'])) {

  $cd_usuario = $_SESSION['usuario'];
  $cd_evento = $_GET['participar'];
  $evento->participarEvento($cd_usuario, $cd_evento);
  header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
  return;

}

// cancelar participação
if (isset($_GET['cancelar'])) {
  $cd_evento = $_GET['cancelar'];
  $cd_usuario = $_SESSION['usuario'];

  $evento->cancelarPart($cd_usuario, $cd_evento);
  header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
}


// pegando dados evento
if (isset($_GET['id'])) {

  $cd_evento = $_GET['id'];
  $evento->__set('cd_evento', $cd_evento);

  $e = $evento->recuperarEvento();
  if (!$e) {
    header('location: ../index.php');
  }
  // se estiver logado verifica participância
  if (isset($_SESSION['usuario'])) {
    $cd_usuario = $_SESSION['usuario'];
    $part = $evento->isParticipante($cd_usuario, $cd_evento);
  }

  // dando valores aos atributos da classe Evento
  $cd_evento = $_GET['id'];
  foreach ($e[0] as $key => $valor) {
    $evento->__set($key, $valor);
  }

  // criador do evento
  $criador = $evento->cd_criador_evento;
  $dadosUser = $usuario->recUsuario($criador);

  if (isset($_SESSION['usuario'])) {
    if ($criador == $_SESSION['usuario']) {
      $userCreator = true;
    }else {
      $userCreator = false;
    }

    // tipo de usuario
    $tipoUsuario = $usuario->recDadoUsuario($_SESSION['usuario'], 'cd_tipo_usuario');
  }
  // num de participantes
  $n = $evento->numParticipantes($evento->cd_evento);

  // Participantes
  $cd_participantes = $evento->participantes($evento->cd_evento);
  $participantes = $usuario->recUsuarios($cd_participantes);

  //limite de mostrar participantes
  $i = 0;

  // verificando se evento já passou
  $evPassado = $evento->eventoPassado($_GET['id']);
}

// denunciar evento
if (isset($_GET['denuncia'])) {

  $id_evento = $_GET['denuncia'];

  // verificando usuario logado para denunciar
  if (!isset($_SESSION['usuario'])) {
    header(sprintf('location: ../paginas/eventos.php?id=%s&denLog=false', $id_evento));
    return false;
  }

  $id_usuario = $_SESSION['usuario'];
  $denuncia = $_POST['denuncia'];

  $fb->denunciar($id_evento, $id_usuario, $denuncia);
  header(sprintf('location: ../paginas/eventos.php?id=%s&denLog=true', $id_evento));
}

// deletar evento
if (isset($_GET['deletar'])) {
  if (isset($_SESSION['usuario'])) {
    $tipoUsuario = $usuario->recDadoUsuario($_SESSION['usuario'], 'cd_tipo_usuario');
    if ($tipoUsuario == 'adm') {
      $id_evento = $_GET['deletar'];
      $evento->cancelarTodos($_GET['deletar']);
      $evento->excluirEvento($id_evento);
      header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
    }
  }
}
