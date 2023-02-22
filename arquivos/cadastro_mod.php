<?php
session_start();

if(!isset($_SESSION['cod_f'])){
	header('Location: entrar.php?erro=2');
}
require_once('db.class.php');

$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso']:0;


$objDb = new db();
$link =  $objDb->conecta_mysql();
$cod_f = $_SESSION['cod_f'];
?>


<!DOCTYPE HTML>
<html lang="pt-br"> 
	<head>
		<meta charset="UTF-8">

		<title>Cadastro de modalidade</title>
		<link rel="icon" href="images/logo.jpg">

		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="estilos.css">
	</head>

	<body style="background: linear-gradient(50deg,white,rgba(235, 167, 66));">

		
		<nav class="navbar navbar-default navbar-fixed-top">

			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarNav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="entrar.php" class="navbar-brand">Centro Cultural Integrado</a>
				</div>

					<div id="navbarNav" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li ><a  href="modalidades.php">Voltar</a></li>
						</ul>
					</div>
			</div>    
		</nav> 
		<br><br><br><br><br><br><br><br>

	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		
	    		<br />
				<form method="post" action="registra_mod.php" id="formRegMod">
					<div class="form-group">
						<input type="text" class="form-control" id="nome_mod" name="nome_mod" placeholder="Nome" required="true">
					</div>

                    <div class="form-group">
						<input type="number" min="1" class="form-control" id="valor_mod" name="valor_mod" placeholder="Valor" required="true">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="dia_mod" name="dia_mod" placeholder="Dia" required="true">
					</div>
					
					<div class="form-group">
						<input type="text" class="form-control" id="hora_mod" name="hora_mod" placeholder="Horário" required="true">
					</div>
					
					<button type="submit" class="btn btn-custom form-control" style="background: rgba(231, 141, 6);color:white; ">Cadastrar</button>
					<?php
						if($sucesso == 1){
							echo 'Modalidade inserida';
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


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>