<?php

require_once "../vendor/autoload.php";
use Classes\Usuario;
use Classes\Database;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);

# ------------------------- cadastrar -------------------------#

function limpaCnpj($valor){
 $valor = trim($valor);
 $valor = str_replace(".", "", $valor);
 $valor = str_replace(",", "", $valor);
 $valor = str_replace("-", "", $valor);
 $valor = str_replace("/", "", $valor);
 return $valor;
};


// erro 2 = usuario existe
// erro 3 = algum campo vazio

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cnpj = limpaCnpj($_POST['cnpj']);
$tipoUsuario = $_POST['tipo_usuario'];

// verificando campos vazios
if(!empty($nome) && !empty($email) && !empty($senha)){

   if($tipoUsuario == 'Instituicao' && empty($cnpj)){
       header('location: ../paginas/cadastro.php?erro=4');
       return false;
   }

    // puxando usuarios existentes
	$userExists = $conn->select("SELECT * FROM tb_usuarios WHERE cd_email_usuario = :email", [
	   'email' => $email
	]);


    // verificando usuarios existentes
	if(count($userExists) >= 1){
	   header('location: ../paginas/cadastro.php?erro=2');
	   return false;
	}

	switch($tipoUsuario){
	    case 'Usuario':
	        $tipo = 'usr';
	        break;
	    case 'Instituicao':
	        $tipo = 'emp';
	}

 // cadastrando
	$usuario->cadastrar($nome, $email, $senha, $cnpj, $tipo);
// 	$id_usuario = $conn->select("SELECT cd_usuario FROM tb_usuarios WHERE cd_email_usuario = :e", ['e' => $email]);

// 	$usuario->__set('id_usuario', $id_usuario);
// 	echo $usuario->id;
	header('location: ../index.php');
}else{
    header('location: ../paginas/cadastro.php?erro=3');
}
