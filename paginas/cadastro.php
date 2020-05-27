<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
        .form-control:focus{
            outline: none;
            box-shadow: none;
            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
	    form{
	        margin-top: 10%;
	    }
		.img {
		    border-right: solid 1px;
		    border-color: rgba(0, 0, 0, 0.2);
		    margin-right: 30px;
		}
		label{
		    width: 100%;
		    margin-bottom: 15px;
		}
		.cnpj{
		    boder-style: none;
		    border-bottom: solid black 1px;
		}
	</style>
</head>
<body>	    

	<form action="../controle/cadastroControle.php" class=" col-12 p-2 d-flex justify-content-center" method="POST">
        <div class="img">
    	   <img src="../logo.png" alt="Logo weact" width="270">
    	   <p class="title">Já tem uma conta? <a href="../index.php">Entre já!</a></p>
    	</div>
    	
		<div class="col-4">
		    <label>
		        <p>Nome</p>
			    <input type="text" name="nome" placeholder="Digite seu nome" class="form-control">
			</label>
			<label>
			    <p>Email</p>
			    <input type="email" name="email" placeholder="Digite seu email" class="form-control">
			</label>
			<label class="form-group">
			    <p>Senha</p>
			    <input type="password" name="senha" placeholder="Digite sua senha" class="form-control">
			</label>
			
			<label class="mb-5 d-flex">
    			<select name="tipo_usuario" id="selectUser" class="form-control col-3 col-sm-5 mr-2">
    				<option>Usuario</option>
    				<option>Instituicao</option>
    			</select>
    			<input type="text" name="cnpj" placeholder="Digite seu CNPJ" maxlength="14" class="form-control col-6" hidden id="cnpj">
			</label>
			<br>
			<button class="btn btn-success mb-2 col-5" name="btn-cadastrar" type="submit">Cadastrar</button> 
	        
    		<?php if(isset($_GET['erro'])){ 
    		    switch ($_GET['erro']){
    		        case 2:
    		            echo '<p class="text-danger">Este usuário já existe. Tente fazer <a href="../index.php" class="text-danger"><u>Login</u></a></p>';
    		            break;
    		        case 3:
    		            echo '<p class="text-danger">Preencha todos os campos!</p>';
    		            break;
    		        case 4:
    		            echo '<p class="text-danger">Informe seu cnpj!</p>';
    		            break;
    		    }
    		} ?>
                
		</div>

	</form>

	<script type="text/javascript">
	

		const user = document.getElementById('selectUser');
		const cnpj = document.getElementById('cnpj');
		
	    window.onload = () => {
	        cnpj.value = "";
	        if(user.value == "Instituicao"){
	            cnpj.removeAttribute('hidden');
	        }
	    }
		user.addEventListener('click', function() {
			if (user.value == 'Instituicao') {
				cnpj.removeAttribute('hidden');
			}else if(user.value == "Usuario"){
			    cnpj.value = "";
				cnpj.setAttribute('hidden', '');
			}
		}) 

	</script>
</body>
</html>