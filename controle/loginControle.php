<?php

session_start();

require "../Classes/Database.php";
require "../Classes/Usuario.php";

use Classes\Usuario;
use Classes\Database;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);

$email = $_POST['email'];
$senha = $_POST['senha'];

if(empty($email) || empty($senha)){
    header('location: ../index.php?erro=1');
}


$log = $usuario->logar($email, $senha, 'location: ../index.php');
if($log == false){
    header('location: ../index.php?erro=1');
}

$_SESSION['auth'] = true;
$_SESSION['usuario'] = $log;
header('location: ../paginas/home.php');


