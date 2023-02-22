<?php
    session_start();

    if(!isset($_SESSION['email'])){
        header('Location: entrar.php?erro=1');
    }
	require_once('db.class.php');

	$objDb = new db();
    $link =  $objDb->conecta_mysql();
	$cod_p = $_SESSION['cod_p'];
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

		<title>Pagamento</title>
		<link rel="icon" href="images/logo.jpg">
		
		
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>



		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="estilos.css">

        <script type="text/javascript">
			$(document).ready(function(){
                function mostraMat(){
					var cod = $(this).data('cod');
                    $.ajax({
                        url: 'checa_turmas_aluno.php',
                        method:'post',
						data:{cod:cod},
                        success: function(data){
                            $('#turmas_mat').html(data);
                        }
                    });
                }
                mostraMat(); 

				$('#btn_paga').click(function(){
					if($('#mod').val()>0){
						$.ajax({
							url: 'confirma_paga.php',
							method: 'post',
							data: $('#form_paga').serialize(),
							success:function(data){
								$('#fim_paga').html(data);
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
		<br><br><br><br><br><br><br><br><br>
		<div class="container">

            <div class="col-md-6">
				<br>
				<br>
				<form id="form_paga" method="post" class="input-group">
					<fieldset>
						<legend>Selecione a forma de pagamento:</legend>

						<div>
							<input type="radio" id="pix" name="forma" value="pix" checked>
							<label for="pix">Pix</label>
						</div>

						<div>
							<input type="radio" id="boleto" name="forma" value="boleto">
							<label for="boleto">Boleto</label>
						</div>

						<div>
							<input type="radio" id="cartao" name="forma" value="cartao">
							<label for="cartao">Cartão</label>
						</div>
					</fieldset>
					<br>
					<input type="number" name="mod" id="mod" class="form-control"  placeholder="Insira o código da modalidade desejada">
					<input type="hidden" name="cod" id="cod" class="form-control"  value=" <?php echo $cod; ?>">
					<br>
					<span class="input-group-btn">
						<button type="button" id="btn_paga" class="btn btn-custom" style="background: rgba(231, 141, 6);color:white; padding: 10px 35px;">Realizar pagamento</button>
					</span>
				</form>
				<div id="fim_paga">

				</div>
            </div>

            <div class="col-md-6">

                <div class="list-group" id="turmas_mat">
                        
                </div>
                    
            </div>

		</div>
		
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>