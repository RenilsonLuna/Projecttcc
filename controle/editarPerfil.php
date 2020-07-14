<?php

require_once "../vendor/autoload.php";
use Classes\Usuario;
use Classes\Database;

$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();
$handler = new \ByJG\Session\JwtSession($sessionConfig);

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);


// retirando campos vazios
foreach ($_POST as $key => $value) {
  if (empty($value)) {
    unset($_POST[$key]);
  }
}
unset($_POST['check']);

$cd = $_SESSION['usuario'];


$dados = [];
// add nome
if (isset($_POST['nome'])) {
  $dados['nm_usuario'] = $_POST['nome'];
}

// add cep
if (isset($_POST['cep'])) {
  $dados['cd_cep_usuario'] = $_POST['cep'];
}

// add senha
if (isset($_POST['senha'])) {
  if ($_POST['senha'] === $_POST['conf']) {
    $dados['cd_senha_usuario'] = $_POST['senha'];
  }else {
    header('location: ../index.php?erro=snh');
  }
}

$usuario->editarUsuario($cd, $dados);

header('location: ../paginas/perfil.php');
