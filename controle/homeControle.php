<?php

  require "vendor/autoload.php";

  $sessionConfig = (new \ByJG\Session\SessionConfig('localhost/tcc'))
    ->withSecret('123456789')
    ->replaceSessionHandler();
  $handler = new \ByJG\Session\JwtSession($sessionConfig);


  $auth = isset($_SESSION['auth']);
  if ($auth) {
     $usuario = $_SESSION['usuario'];
  }
