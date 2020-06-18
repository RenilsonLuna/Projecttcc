<?php

require_once "../vendor/autoload.php";
use Classes\Usuario;
use Classes\Database;
use Respect\Validation\Validator;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);
$validate = new Validator();

# ------------------------- cadastrar -------------------------#

function limpaDoc($valor){
 $valor = trim($valor);
 $valor = str_replace(".", "", $valor);
 $valor = str_replace(",", "", $valor);
 $valor = str_replace("-", "", $valor);
 $valor = str_replace("/", "", $valor);
 return $valor;
};

// erro 2 = usuario existe
// erro 3 = algum campo vazio
// erro 4 = cpf ou cnpj inválido
// erri 5 = conf e senha diferentes

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$conf = $_POST['conf'];
$cpf = $_POST['cpf'];
$tipoUsuario = $_POST['tipo'];
$cep = $_POST['cep'];
$img = $_FILES['img_perfil'];


// verificando campos vazios
foreach ($_POST as $key) {
  if (empty($key) && $key !== $cpf) {
    header('location: ../paginas/cadastro.php?erro=3');
    return false;
  }
}

$cpf = limpaDoc($cpf);

// verificando tipo de usuario
switch($tipoUsuario){
  case 'Usuario':
  $tipo = 'usr';
  $validCpf = $validate::cpf()->validate($cpf);
  break;
  case 'Instituicao':
    $tipo = 'emp';
    $validCpf = $validate::digit()->cnpj()->validate($cpf);
    break;
}

if (!$validCpf) {
  header('location: ../paginas/cadastro.php?erro=4');
  return false;
}

// verificando a senha
$validPass = $validate::equals($senha)->validate($conf);
if (!$validPass) {
  header('location: ../paginas/cadastro.php?erro=5');
  return false;
}

// img de perfil
if (empty($_FILES)) {
  header('location: ../paginas/cadastro.php?erro=3');
  return false;
}
$formatosPermitidos = array('png', 'jpg', 'jpeg');
$extensao = pathinfo($img['name'], PATHINFO_EXTENSION);
$temporario = $img['tmp_name'];
$img = uniqid().".".$extensao;

if (in_array($extensao, $formatosPermitidos)) {

  $caminho = '../imgs/img_perfis/';

  if(move_uploaded_file($temporario, $caminho.$img)) {
    echo "Arquivo movido";
  }else {
    echo "Arquivo não movido";
  }
}else{
  header('location: ../paginas/cadastro.php?erro=6');
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

// cadastrando
$usuario->cadastrar($nome, $email, $senha, $cpf, $img, $tipo, $cep);
header('location: ../index.php');
