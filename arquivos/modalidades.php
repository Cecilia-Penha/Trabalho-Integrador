<?php
    session_start();

    if(!isset($_SESSION['cod_f'])){
        header('Location: entrar.php?erro=2');
    }
	require_once('db.class.php');

	$objDb = new db();
    $link =  $objDb->conecta_mysql();
	$cod_f = $_SESSION['cod_f'];
    


?>
<!DOCTYPE HTML>
<html lang="pt-br"> 
	<head>
		<meta charset="UTF-8">

		<title>Modalidades</title>
		<link rel="icon" href="images/logo.jpg">
		
		
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>



		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="estilos.css">

		<script type="text/javascript">
			$(document).ready(function(){
				function mostraMod(){
					$.ajax({
						url: 'checa_alunos.php',
						success: function(data){
							$('#mods').html(data);
						}
					});
				}
				mostraMod();

				$('#btn_procurar').click(function(){
					if($('#turma').val()>0){
						$.ajax({
							url: 'exibe_alunos_mod.php',
							method: 'post',
							data: $('#form_procurar_turma').serialize(),
							success:function(data){
								$('#alunos').html(data);
							}
						});
					}

				});

			});
		</script>
	
				
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
						<li ><a  href="cadastro_mod.php">Cadastrar modalidade</a></li>
						<li ><a  href="entrar.php">Voltar</a></li>
					</ul>
				</div>
		</div>    
	</nav>  
	<br><br><br><br><br><br><br>
		<div class="container">
			<div class="cod-md-6">
				<form id="form_procurar_turma" class="input-group" method="post">
					<input type="number" name="turma" id="turma" class="form-control" placeholder="Pesquisar turma por código">
						<span class="input-group-btn">
							<button type="button" id="btn_procurar" class="btn btn-custom"style="background: rgba(231, 141, 6);color:white;">Procurar</button>
						</span>
				</form>
			</div>
			<br><br>
			<div class="col-md-6">
				<div class="list-group" id="mods">
					
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="list-group" id="alunos">

				</div>
			</div>
		</div>
		
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>