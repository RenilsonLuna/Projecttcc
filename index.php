<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php if(isset($_GET['erro']) && $_GET['erro'] == 4) { ?>
    <div class="fixed-top bg-danger text-light text-center p-2"><h3>Faça login para entrar</h3></div>
    <?php } ?>
	<form action="controle/loginControle.php" method="POST">
		<div class="conteudomain">
			<img src="logo.png" alt="Logotipo">
			<br>
			<div class="fzrlogin">
				<p>Fazer Login</p>
			</div>
		</div>
		<div class="content">
			<br>

			<label class="email form-control">
				<img class="icon-email icon mr-1" src="./icones/user.svg" width="25" height="20" alt="usuario">
				<input type="text" value="" name="email" class="senha input" placeholder="Digite seu email" autocomplete="off">
			</label>

			<label class="senha form-control">
				<img src="./icones/lock.svg" alt="Cadeado" width="25" height="20" class="mr-1">
				<input type="password" name="senha" value="" class="email input" placeholder="Digite sua senha">
			</label>

			<?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
			<p class="text-danger">Usuario ou Senha incorretos!</p>
			<?php } ?>
			<input type="submit" name="btn-logar" class="buttom py-1" value="Entrar">
			<p class="mt-2">Não tem uma conta? <a class="cadastre" href="paginas/cadastro.php">Cadastre-se</a></p>
		</div>
		<br>

	</form>
</body>
</html>