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

$params = explode('?', $pgnAnterior);

// tratamento da url para erro de login
// separando os parametros da url em um array
// apagando os parametros que começam com &
if ($params[0] == "http://localhost/tcc/paginas/eventos.php") {
  $id = $params[1];
  array_splice($params, 2, 2);
  $pgnAnterior = implode($params, '?');
  $param = strstr($pgnAnterior, '&');
  $pgnAnterior = str_replace($param, '', $pgnAnterior);
  $separador = '&';
}else {
  $param = strstr($pgnAnterior, '?');
  $pgnAnterior = str_replace($param, '', $pgnAnterior);
  $separador = '?';
}

$email = $_POST['email'];
$senha = $_POST['senha'];

// verificando campos vazios
if(empty($email) || empty($senha)){
    header(sprintf('location: %s%serro=2', $pgnAnterior, $separador));
    return false;
}
$log = $usuario->logar($email, $senha);

// verificando log
if($log == false) {
  header(sprintf('location: %s%serro=1', $pgnAnterior));
  return false;
}

// autenticando usuário
$_SESSION['auth'] = true;
$_SESSION['usuario'] = $log[0]['cd_usuario'];

// redirecionando pra página anterior
header(sprintf('location: %s', $pgnAnterior));
