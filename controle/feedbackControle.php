<?php

require "../vendor/autoload.php";

$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();
$handler = new \ByJG\Session\JwtSession($sessionConfig);

// auth
include "authControle.php";

use Classes\Usuario;
use Classes\Database;
use Classes\Evento;
use Classes\Feedback;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$usuario = new Usuario($conn);
$evento = new Evento($conn);
$fb = new Feedback($conn);

if (!isset($_SESSION['usuario'])) {
  header('location: ../index.php');
}

if (!isset($_GET['rec']) || $_GET['rec'] == 'fb') {
  $fed = $fb->recFeedbacks();
}
if (isset($_GET['rec']) && $_GET['rec'] == 'den') {
  $den = $fb->recDenuncias();
}

if (isset($_SESSION['usuario'])) {
  if (isset($_GET['deletarFb'])) {
    $cdFb = $_GET['deletarFb'];
    $fb->excluirFeedback($cdFb);
    header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
  }
  if (isset($_GET['deletarDen'])) {
    $cdDen = $_GET['deletarDen'];
    $fb->excluirDenuncia($cdDen);
    header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
  }
}
