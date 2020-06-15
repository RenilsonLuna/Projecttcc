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

$pgnAnterior = $_SERVER['HTTP_REFERER'];

$param = strstr($pgnAnterior, '?');
$pgnAnterior = str_replace($param, '', $pgnAnterior);

$email = $_POST['email'];
$senha = $_POST['senha'];


if(empty($email) || empty($senha)){
    header(sprintf('location: %s?erro=2', $pgnAnterior));
    return false;
}
$log = $usuario->logar($email, $senha);

// verificando log
if($log == false) {
  header(sprintf('location: %s?erro=1', $pgnAnterior));
  return false;
}

// autenticando usuário
$_SESSION['auth'] = true;
$_SESSION['usuario'] = $log[0]['cd_usuario'];

// redirecionando pra página anterior
header(sprintf('location: %s', $pgnAnterior));
