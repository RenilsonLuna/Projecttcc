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

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);


function tipoUser($u){
  switch ($u) {
    case 'adm':
      return 'Administrador';
      break;
    case 'usr':
      return 'Usuario';
      break;
    case 'emp':
      return 'Instituição';
      break;
  }
}
if (isset($_GET['q'])) {
  $nome = $_GET['q'];
  $users = $conn->select("SELECT * FROM tb_usuarios WHERE nm_usuario LIKE '%$nome%'", [
    'nm' => $nome
  ]);

}else{
  header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
}
