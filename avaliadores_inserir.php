<!DOCTYPE html>
<html>	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Academia</title>		
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	</head>
	<body role="document">	
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">				
					<a class="navbar-brand" href="index.html">Academia</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">	
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clientes<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="clientes_inserir.php">Inserir</a></li>
								<li><a href="clientes_listar.php">Listar</a></li>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Avaliadores<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="avaliadores_inserir.php">Inserir</a></li>
								<li><a href="avaliadores_listar.php">Listar</a></li>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Avaliações<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="avaliacoes_inserir.php">Inserir</a></li>
								<li><a href="avaliacoes_listar.php">Listar</a></li>								
							</ul>
						</li>
					</ul>				
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="page-header">
				<h1>Cadastro de Avaliadores</h1>
			</div>
			<ol class="breadcrumb">
				<li><a href="index.html">Academia</a></li>
				<li><a href="#">Avaliadores</a></li>
				<li class="active">Cadastro</li>
			</ol>
			
			<form action="avaliadores_inserir.php" role="form" method="POST" name="cadAvaliadores">
				<div class="form-group">
					<label for="nome">Nome:</label>
					<input type="text" name="nome"  class="form-control">
				</div>
				<div class="form-group">				
					<label for="endereco">Endereço:</label>
					<input type="text" name="endereco"  class="form-control">
				</div>
				<div class="form-group">				
					<label for="email">E-Mail:</label>
					<input type="text" name="email"  class="form-control">
				</div>
				
				<div class="form-group">				
					<label for="telefone">Telefone:</label>
					<input type="text" name="telefone" id="telefone" class="form-control">
				</div>
				<p>
					<input type="submit" value="Salvar" class="btn btn-primary btn-lg">
				</p>
			</form>		
		</div>
		<?php		
			if(isset($_POST["nome"])){
				require('funcoes.php');
				$umAvaliador = new Avaliador();			
				$umAvaliador->nome = $_POST["nome"];
				$umAvaliador->endereco = $_POST["endereco"];
				$umAvaliador->telefone = $_POST["telefone"];
				$umAvaliador->email = $_POST["email"];
				if($umAvaliador->salvar())
				{				
					echo("<script type=\"text/javascript\">location.href = \"avaliadores_listar.php\";</script>");							
				}else
				{
					echo("nao salvou");
				}			
			}	
		?>
	</body>	
	<script src="bootstrap/js/jquery-1.11.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
	<script src="bootstrap/js/maskedinput.min.js"></script>	
	<script type="text/javascript">	
		jQuery(function($){		   
		   $("#telefone").mask("(99)9999-9999");	   
		});	
	</script>
</html>