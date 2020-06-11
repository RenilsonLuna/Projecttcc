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

$cd_evento = $_GET['id'];
$evento->__set('cd_evento', $cd_evento);

$e = $evento->recuperarEvento();

foreach ($e[0] as $key => $valor) {
  $evento->__set($key, $valor);
}
