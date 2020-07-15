<?php

if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
  $auth = true;
}else {
  $auth = false;
}

require "../vendor/autoload.php";

use Classes\Usuario;
use Classes\Database;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);

$tipoUsr = null;

if (isset($_SESSION['usuario'])) {
  $tipoU = $usuario->recDadoUsuario($_SESSION['usuario'], "cd_tipo_usuario");
}

?>
