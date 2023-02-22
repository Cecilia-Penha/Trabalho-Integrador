<?php
    $erro = isset($_GET['erro']) ? $_GET['erro']:0;
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

    <body id="entrada">
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
						<li class="  <?= $erro == 2 ? 'open':'' ?>">
							<a id="entrar_func" href="#"  data-toggle="dropdown" role="button" >Área dos Funcionários</a>
							<ul class="dropdown-menu" aria-labelledby="entrar">
								
								<div class="col-md-12">
									<p>Entre com seu código</h3>
									<br />
									<form method="post" action="valida_func.php" id="formFunc">
										
										<div class="form-group">
											<input type="text" class="form-control red" id="campo_codf" name="cod_f" placeholder="Código" />
										</div>
									
										<div class="form-group">
											<input type="password" class="form-control red" id="campo_senha_f" name="senha_f" placeholder="Senha" />
										</div>
									
										<button type="submit" class="btn btn-custom" style="background:rgba(231, 141, 6);color:white;" id="btn_func">Entrar</button>

											<br /><br />
									
									</form>
									<?php
										if($erro == 2){
											echo '<font color = #FF0000> Código ou senha inválido(s)</font>';
										}
									?>
								</div>
							</ul>
						</li>
						<li ><a  href="cadastro.php">Cadastrar</a></li>
						<li class="divisor" role="separator"></li>

						<li class="  <?= $erro == 1 ? 'open':'' ?>">
							<a id="entrar" href="#"  data-toggle="dropdown" role="button">Entrar</a>
							<ul class="dropdown-menu" aria-labelledby="entrar">
								
								<div class="col-md-12">
									<p>Você possui uma conta?</h3>
									<br />
									<form method="post" action="login.php" id="formLogin">
										
										<div class="form-group">
											<input type="text" class="form-control red" id="campo_email" name="email" placeholder="Email" />
										</div>
									
										<div class="form-group">
											<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
										</div>
									
										<button type="submit" class="btn btn-custom" style="background:rgba(231, 141, 6);color:white;" id="btn_login">Entrar</button>

										<br /><br />
									
									</form>
									<?php
										if($erro == 1){
											echo '<font color = #FF0000> Email ou senha inválido(s)</font>';
										}
									?>
								</div>
							</ul>
						</li>
					</ul>
				</div>
            </div>    
        </nav>  
		<!-- fim nav-->	
		
    <br><br><br><br><br><br><br><br><br><br><br>                
		<div class="capa">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
          
          </div>
        </div>
      </div>
    </div>
	
    <!--Conteúdos-->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <section id="conteudo">
      <div class="container">

        <div class="row">
          
          <div class="col-md-8">
            <h2>Conheça nossos cursos</h2><br>
            <p>Seja bem-vindo ao Centro Cultural Integrado, um espaço integrativo na cidade de Bagé, que há quase 20 anos oferece serviços que viabilizem qualidade de vida aos clientes e alunos.</p>
            <p>Contamos com diversos profissionais para atender às demandas nas variadas áreas de atuação de nosso espaço colaborativo.</p>        
          </div>          
          <div class="col-md-4">
           
          </div>

        </div>

      </div>
    </section>
    <section id="conteudo2">
      <div class="container">

        <div class="row">
          
          <div class="col-md-8">
          

            <h3>Experimente</h3>
            
            <p>Faça uma aula experimental e encontre a atividade perfeita para você!</p>
            
            <h3>Oficinas</h3>

            <p>Conheça nossas oficinas de teatro e dança. Inscrições Abertas!</p>

            <h3>Artes marciais</h3>

            <p>Aikido, capoeira e karatê são as modalidades de lutas presentes em nosso quadro de atividade no Centro Cultural Integrado. 
            Confira nossos horários e pratique Artes Marciais! </p>
          </div>

          <div class="col-md-4">
          
          </div>

        </div>

      </div>             
    </section>

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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </body>
</html>