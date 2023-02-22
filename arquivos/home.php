<?php
    session_start();

    if(!isset($_SESSION['email'])){
        header('Location: entrar.php?erro=1');
    }
	require_once('db.class.php');

	$objDb = new db();
    $link =  $objDb->conecta_mysql();
	$cod_p = $_SESSION['cod_p'];
	


?>
<!DOCTYPE HTML>
<html lang="pt-br"> 
	<head>
		<meta charset="UTF-8">

		<title>Centro Cultural Integrado</title>
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
						<li ><a  href="entrar.php">Voltar</a></li>
					</ul>
				</div>
		</div>    
	</nav> 
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div class="capa" style="display:table;width: 100%;">
		<div class="texto-capa" style=" text-align:center;color:white;display: table-cell;vertical-align: middle;">
			<br><br>
			<a href="matricula.php" class="btn btn-custom btn-laranja btn-lg" style="background: rgba(231, 141, 6);color:white; padding: 10px 35px;">Realizar matrícula</a>
			<a href="pagamento.php" class="btn btn-custom btn-branco btn-lg" style="background: rgba(231, 141, 6);color:white;padding: 10px 35px;">Realizar pagamento</a> 
		</div>
	</div>


	<br><br><br><br><br><br><br><br><br>	
	<footer id="rodape">
      <div class="container">

        <div class="row">

          <div class="col-md-4">
            <h3 style="color:white;">Centro Cultural Integrado</h3><br><br>
          </div>

          <div class="col-md-4">
            <h4>Ajuda</h4>
            <ul class="nav">
              <li><a href=# >Contate-nos</a></li>
              <li><a href=# >Professores</a></li>
              <li><a href=# >Horários</a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <ul class="nav">
              <li class="item-rede-social"><a href=#><img src="images/facebook.png"></a></li>
              <li class="item-rede-social"><a href=#><img src="images/twitter.png"></a></li>
              <li class="item-rede-social"><a href=#><img src="images/instagram.png"></a></li>
            </ul><br>
            <h4 style="text-transform: none; text-align:right;">Bagé, Rio Grande do Sul </h4>
            <h4 style="text-transform: none; text-align:right;">Rua Juvêncio Lemos, 164 </h4>
          </div>
        </div>

      </div>
    </footer>	
		
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>