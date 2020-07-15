<?php

if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
  $auth = true;
}else {
  $auth = false;
}

// require "../vendor/autoload.php";
//
// use Classes\Usuario;
// use Classes\Database;
// use Classes\Evento;
// use Classes\Feedback;
//
// $conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
// $usuario = new Usuario($conn);
// $evento = new Evento($conn);
// $fb = new Feedback($conn);
//
// $tipo = null;
// if ($auth) {
//   $tipo = $usuario->recDadoUsuario($_SESSION['usuario'], "cd_tipo_usuario");
// }

?>
