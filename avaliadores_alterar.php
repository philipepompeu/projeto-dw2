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
				<li><a href="avaliadores_listar.php">Listar</a></li>
				<li class="active">Detalhes</li>
			</ol>			
			<?php
				require("funcoes.php");
				$umAvaliador = new Avaliador();
				if(isset($_GET["codigo"]))
				{					
					$umAvaliador->codigo = $_GET["codigo"];
					$umAvaliador->carregarDados ();					
				}
			?>
			<form action="avaliadores_action.php" role="form" method="POST" name="aval_editar">
				
				<div class="form-group">
					<label for="nome">Código:</label>
					<?php
						echo("<input type=\"text\" name=\"codigo\"  class=\"form-control\" value=\"$umAvaliador->codigo\" readonly>");
					?>					
				</div>
				
				<div class="form-group">
					<label for="nome">Nome:</label>
					<?php
						echo("<input type=\"text\" name=\"nome\"  class=\"form-control\" value=\"$umAvaliador->nome\">");
					?>					
				</div>
				<div class="form-group">				
					<label for="endereco">Endereço:</label>
					<?php
						echo("<input type=\"text\" name=\"endereco\"  class=\"form-control\" value=\"$umAvaliador->endereco\">");
					?>
				</div>
				<div class="form-group">				
					<label for="email">E-Mail:</label>
					<?php
						echo("<input type=\"text\" name=\"email\"  class=\"form-control\" value=\"$umAvaliador->email\">");
					?>					
				</div>
				
				<div class="form-group">				
					<label for="telefone">Telefone:</label>
					<?php
						echo("<input type=\"text\" name=\"telefone\"  id=\"telefone\"class=\"form-control\" value=\"$umAvaliador->telefone\">");
					?>					
				</div>
				<p>
					<a class="btn btn-default btn-lg" href="avaliadores_listar.php" role="button">Voltar</a>					
					<input type="submit" value="Salvar" class="btn btn-primary btn-lg" name="Salvar">					
					<input type="submit" value="Excluir" class="btn btn-danger btn-lg" name="Excluir">
				</p>
			</form>		
		</div>		
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