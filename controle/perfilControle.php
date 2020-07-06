<?php

require "../vendor/autoload.php";

// incluindo biblioteca de session-token
$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();
$handler = new \ByJG\Session\JwtSession($sessionConfig);

if (!isset($_SESSION['usuario']) && !isset($_GET['usuario'])) {
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
if (isset($_SESSION['usuario'])) {
  $perfilUser = isset($_GET['usuario']) ? $_GET['usuario'] : $_SESSION['usuario'];
}else {
  $perfilUser = $_GET['usuario'];
}

$dados = $conn->select(sprintf('SELECT * FROM tb_usuarios WHERE cd_usuario = %s', $perfilUser), [], \PDO::FETCH_ASSOC);

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
$seuEvento = $evento->seusEventos($perfilUser);
$eventosPart = $evento->eventosParticipando($perfilUser);
$eventoArray = [];
for ($i=0; $i < count($eventosPart); $i++) {
  $usuario_evento = $eventosPart[$i];
  $cd_evento = $usuario_evento['cd_evento'];
  $evento->__set('cd_evento', $cd_evento);
  $eventoArray[$i] = $evento->recuperarEvento();
}
