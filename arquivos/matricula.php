<?php
    session_start();

    if(!isset($_SESSION['email'])){
        header('Location: entrar.php?erro=1');
    }
	require_once('db.class.php');

	$objDb = new db();
    $link =  $objDb->conecta_mysql();
	$email = $_SESSION['email'];
	
	$sql = "select cod_p as cod from usuario where email = '$email'";
	$resultado_id = mysqli_query($link,$sql);

	
	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
		$cod = $registro['cod'];
	}
	

?>
<!DOCTYPE HTML>
<html lang="pt-br"> 
	<head>
		<meta charset="UTF-8">

		<title>Matricule-se</title>
		<link rel="icon" href="images/logo.jpg">
		
		
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>



		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="estilos.css">

		<script type="text/javascript">
			$(document).ready(function(){
				function mostraMod(){
					$.ajax({
						url: 'get_mod.php',
						success: function(data){
							$('#mods').html(data);
						}
					
					});
				}
				mostraMod();
				$('#btn_matricula').click(function(){
					if($('#mod').val()>0){
						$.ajax({
							url: 'confirma_mat.php',
							method: 'post',
							data: $('#form_confirma_mat').serialize(),
							success:function(data){
								$('#fim_mat').html(data);
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
							<li ><a  href="home.php">Voltar</a></li>
						</ul>
					</div>
			</div>    
		</nav> 
		<br><br><br><br><br><br>
		<div class="container">
			<div class="col-md-6">
				<div class="list-group" id="mods">
					
				</div>
			</div><br><br><br><br>
			<div class="col-md-6">
				<div class="list-group" id="confirma">
					<form id="form_confirma_mat" class="input-group" method="post">
						<input type="hidden" name="cod" id="cod" class="form-control"  value=" <?php echo $cod; ?>">
						<input type="number" name="mod" id="mod" class="form-control"  placeholder="Insira o código da modalidade desejada">
						<span class="input-group-btn">
							<button type="button" id="btn_matricula" class="btn btn-custom"style="background: rgba(231, 141, 6);color:white; ">Matricular</button>
						</span>
					</form>
				</div>
				<br>
				<div class="list-group"id="fim_mat">

				</div>
			</div>
			
			
		</div>
		
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>