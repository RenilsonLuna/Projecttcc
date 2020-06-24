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

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);
$evento = new Evento($conn);


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

  // se estiver logado verifica participância
  if (isset($_SESSION['usuario'])) {
    $cd_usuario = $_SESSION['usuario'];
    $participante = $evento->isParticipante($cd_usuario, $cd_evento);
  }

  // dando valores aos atributos da classe Evento
  $cd_evento = $_GET['id'];
  foreach ($e[0] as $key => $valor) {
    $evento->__set($key, $valor);
  }

  // criador do evento
  $criador = $evento->cd_criador_evento;
  $dadosUser = $usuario->recUsuario($criador);

  // num de participantes
  $n = $evento->numParticipantes($evento->cd_evento);
}
