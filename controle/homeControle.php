<?php
session_start();
$auth = isset($_SESSION['auth']);
if ($auth) {
  $usuario = $_SESSION['usuario'][0];
}
?>
