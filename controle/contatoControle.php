<?php

require "../vendor/autoload.php";

use Classes\Database;
use Classes\Feedback;

$conn = new Database('mysql', 'localhost', 'weacttcc', 'root', '');
$fb = new Feedback($conn);

$sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
  ->withSecret('123456789')
  ->replaceSessionHandler();

$handler = new \ByJG\Session\JwtSession($sessionConfig);

// autenticando
include "authControle.php";

// enviando
$post = $_POST;

if (isset($post['btn-enviar'])) {

  if (empty($post['mensagem']) || empty($post['assunto'])) {
  header('location: ../paginas/contato.php?erro=3');
  }
  try {
    $fb->enviarFeedback($post['assunto'], $post['mensagem'], $_SESSION['usuario']);
  } catch (\Exception $e) {
    header('location: ../paginas/contato.php?enviado=2');
  }
  header('location: ../paginas/contato.php?enviado=1');

}
