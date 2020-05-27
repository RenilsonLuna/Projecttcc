<?php 
session_start(); 
$usuario = $_SESSION['usuario'][0];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<style>
	    #img_usuario{
	        border-radius: 50%;
	    }
	</style>
</head>
<body>
    
    <main class="d-flex justify-cotent-center container py-5">
        <img src="../imgs/img_perfis/<?= $usuario['cd_img_perfil'] ?>" id="img_usuario" width="150" height="150">
    	<h1 class="title display-4 text-center pt-4 pl-3">Bem vindo <?=$usuario['nm_usuario']?>!</h1>
	</main>
</body>
</html>