<?php

session_start();

require "../autoload.php";

use Classesz\Usuario;
use Classes\Database;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);

$email = $_POST['email'];
$senha = $_POST['senha'];

// verificando campos vazios
if(empty($email) || empty($senha)){
    header('location: ../index.php?erro=15');
}

// logando
$log = $usuario->logar($email, $senha);

// Validando usuário
if($log == false){
    header('location: ../index.php?erro=16');
}

// autenticando usuário
$_SESSION['auth'] = true;
$_SESSION['usuario'] = $log;
