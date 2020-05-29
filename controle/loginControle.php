<?php
require "../vendor/autoload.php";

$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();
$handler = new \ByJG\Session\JwtSession($sessionConfig);

use Classes\Usuario;
use Classes\Database;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);

$email = $_POST['email'];
$senha = $_POST['senha'];


if(empty($email) || empty($senha)){
    header('location: ../index.php?erro=2');
    return false;
}

$log = $usuario->logar($email, $senha);

if($log == false) {
  header('location: ../index.php?erro=1');
  return false;
}


// autenticando usuário
$_SESSION['auth'] = true;
$_SESSION['usuario'] = $log[0];

header('location: ../index.php');
