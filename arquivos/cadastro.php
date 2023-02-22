<?php
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email']:0;
$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso']:0;
?>


<!DOCTYPE HTML>
<html lang="pt-br"> 
	<head>
		<meta charset="UTF-8">

		<title>Cadastro</title>
		<link rel="icon" href="images/logo.jpg">
		
		
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		

		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="estilos.css">
	
	</head>

	<body style="background: linear-gradient(50deg,white,rgba(235, 167, 66));">

		
		<nav class="navbar navbar-default navbar-fixed-top">

			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#resNav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="entrar.php" class="navbar-brand">Centro Cultural Integrado</a>
				</div>

					<div id="navbarNav" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li ><a  href="entrar.php">Voltar</a></li>
						</ul>
					</div>
			</div>    
		</nav>  

		<!--fim nav-->
	    <div class="container">
	    	
	    	<br /><br /><br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		
	    		<br />
				<form method="post" action="registro.php" id="formCadastro">
					<div class="form-group">
						<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="true">
					</div>

                    <div class="form-group">
						<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" required="true">
					</div>

                    <div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required="true">
					</div>
                    <?php
						if($erro_email){
							echo '<font style="color:#FF0000">Email já cadastrado!';
						}
					?>

                    <div class="form-group">
						<input type="text" class="form-control" id="dat" name="dat" placeholder="Data de Nascimento: Ano/Mês/Dia" required="true">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required="true">
					</div>
					
					<div class="form-group">
						<input type="text" class="form-control" id="nome_resp" name="nome_resp" placeholder="Nome do Responsável" required="true">
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="true">
					</div>
					
					<button type="submit" class="btn btn-custom form-control" style="background: rgba(231, 141, 6); color:white;">Cadastre-se</button>
					<?php
						if($sucesso == 1){
							echo 'Cadastro concluído!';
						}
					?>
				</form>
			</div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>



	    
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>