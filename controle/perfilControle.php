<?php

require "../vendor/autoload.php";

// incluindo biblioteca de session-token
$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();
$handler = new \ByJG\Session\JwtSession($sessionConfig);

if (!isset($_SESSION['usuario'])) {
  header('location: ../index.php');
}

// classes
use Classes\Database;
use Classes\Usuario;
use Classes\Evento;

// objetos
$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);
$evento = new Evento($conn);

// controle de acesso
include "authControle.php";

// definindo atributos do usuário
$cd_usuario = $_SESSION['usuario'];
$usuario->__set('id', $cd_usuario);
$dados = $conn->select(sprintf('SELECT * FROM tb_usuarios WHERE cd_usuario = %s', $cd_usuario), [], \PDO::FETCH_ASSOC);

foreach ($dados[0] as $chave => $valor) {
  $usuario->__set($chave, $valor);
}

switch ($usuario->cd_tipo_usuario) {
  case 'emp':
  $tipo = 'Instituição';
  break;
  case 'usr';
  $tipo = 'Usuário';
  break;
  case 'adm';
  $tipo = 'Administrador';
  break;
}

// eventos criados pelo usuario
$seuEvento = $evento->seusEventos($cd_usuario);
$eventosPart = $evento->eventosParticipando($cd_usuario);
$eventoArray = [];
for ($i=0; $i < count($eventosPart); $i++) {
  $usuario_evento = $eventosPart[$i];
  $cd_evento = $usuario_evento['cd_evento'];
  $evento->__set('cd_evento', $cd_evento);
  $eventoArray[$i] = $evento->recuperarEvento();
}
