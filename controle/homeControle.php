<?php

require "vendor/autoload.php";

$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();
$handler = new \ByJG\Session\JwtSession($sessionConfig);


$auth = isset($_SESSION['auth']);
if ($auth) {
   $usuario = $_SESSION['usuario'];
}

use Classes\Usuario;
use Classes\Database;
use Classes\Evento;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);
$evento = new Evento($conn);

$counter = 0;
$e = $evento->todosEventos();

// buscando evento
if (isset($_GET['q'])) {
  $nome = $_GET['q'];
  $e = $conn->select("SELECT * FROM tb_eventos WHERE nm_evento LIKE '%$nome%'", [
    'nm' => $nome
  ]);
}
