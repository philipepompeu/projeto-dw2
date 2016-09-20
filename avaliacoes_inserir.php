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
				<h1>Lançamento de Avaliações</h1>
			</div>
			<ol class="breadcrumb">
				<li><a href="index.html">Academia</a></li>
				<li><a href="#">Avaliações</a></li>
				<li class="active">Cadastro</li>
			</ol>
			<form action="avaliacoes_inserir.php" role="form" method="POST">				
				<div class="form-group">
					<label for="codCliente">Cliente:</label>					
					<select name="codCliente" class="form-control" id="codCliente">
						<?php
							require('funcoes.php');
							$clientes = new Cliente;
							$clientela = $clientes::listaClientes(); 
							
							foreach ($clientela as &$umCliente) 
							{
								echo("<option value=\"$umCliente->id\">$umCliente->nome</option>");
							}
						?>
					</select>
				</div>
				<div class="form-group">				
					<label for="codAvaliador">Avaliador:</label>					
					<select name="codAvaliador" class="form-control" id="codAvaliador">
						<?php
							//require('funcoes.php');
							$nomeClasse = "Avaliador";
							$umaListaDeAvaliadores = $nomeClasse::retornarAvaliadores(); 
							
							foreach ($umaListaDeAvaliadores as &$umAvaliador) 
							{
								echo("<option value=\"$umAvaliador->codigo\">$umAvaliador->nome</option>");
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="data">Data da Avaliação:</label>
					<input type="date" name="data"  class="form-control">
				</div>
				<div class="form-group">
					<label for="observacao">Observação:</label>
					<textarea rows="5" name="observacao" id="observacao" class="form-control"></textarea>
				</div>
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Risco Coronário</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">				
							<label for="idade">Idade:</label>
							<select name="idade" class="form-control" id="idade">
								<option value="1">9-17</option>
								<option value="2">18-25</option>
								<option value="3">26-35</option>
								<option value="4">36-45</option>
								<option value="5">45-59</option>
								<option value="6">Acima de 60</option>
							</select>
						</div>
						<div class="form-group">
							<label for="genero">Gênero:</label>
							<select name="genero" class="form-control">
								<option value="1">Masculino</option>
								<option value="2">Feminino</option>
							</select>
						</div>						
						<div class="form-group">
							<label for="fumante">Fumante?</label>
							<div class="radio">						
								<label><input type="radio" name="fumante" id="fumante1" value="1">Sim</label>
								<label><input type="radio" name="fumante" id="fumante2" value="2" checked>Não</label>
							</div>
						</div>
						<div class="form-group">
							<label for="pressao">Pressão:</label>
							<input type="number" name="pressao"  class="form-control">
						</div>
						<div class="form-group">
							<label for="historicoCardiaco">Histórico Cardiaco?</label>
							<div class="radio">						
								<label><input type="radio" name="historicoCardiaco" id="historicoCardiaco1" value="1">Sim</label>
								<label><input type="radio" name="historicoCardiaco" id="historicoCardiaco2" value="2" checked>Não</label>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Risco de Diabetes</h3>
					</div>
					<div class="panel-body">												
						<div class="form-group">	
							<label for="glicemia">Glicemia:</label>
							<input type="number" name="glicemia" class="form-control">
						</div>								
						<div class="form-group">
							<label for="historicoDiabetes">Histórico Diabetes?</label>
							<div class="radio">						
								<label><input type="radio" name="historicoDiabetes" id="historicoDiabetes1" value="1">Sim</label>
								<label><input type="radio" name="historicoDiabetes" id="historicoDiabetes2" value="2" checked>Não</label>
							</div>
						</div>			
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Composição e Capacidade Neuromotora</h3>
					</div>
					<div class="panel-body">
						<div class="col-xs-4">
							<div class="form-group">
								<label for="altura">Altura:</label>
								<input type="text" name="altura"  class="form-control">
							</div>
							<div class="form-group">
								<label for="peso">Peso:</label>
								<input type="number" name="peso"  class="form-control">
							</div>					
							<div class="form-group">
								<label for="flexoes">Quantidade de Flexões:</label>
								<input type="number" name="flexoes" id="flexoes" class="form-control">
							</div>
							<div class="form-group">
								<label for="abdominais">Quantidade de Abdominais:</label>
								<input type="number" name="abdominais" class="form-control">
							</div>							
						</div>
					</div>
				</div>
				<p>
					<input type="submit" value="Avaliar" class="btn btn-default btn-lg">
				</p>
			</form>
			<?php
				
				if(isset($_POST["codCliente"]))
				{
					$umaAvaliacao = new Avaliacao();			
					$umaAvaliacao->codigoCliente = $_POST["codCliente"];
					$umaAvaliacao->codigoAvaliador=$_POST["codAvaliador"];
					$umaAvaliacao->data=$_POST["data"];
					$umaAvaliacao->observacao=$_POST["observacao"];
					
					$umaAvaliacao->pressao=$_POST["pressao"];
					$umaAvaliacao->glicemia=$_POST["glicemia"];
					$umaAvaliacao->historicoDiabetes=$_POST["historicoDiabetes"];
					$umaAvaliacao->historicoCardiaco=$_POST["historicoCardiaco"];		
					$umaAvaliacao->isFumante=$_POST["fumante"];
					$umaAvaliacao->genero=$_POST["genero"];
					$umaAvaliacao->idade=$_POST["idade"];
					$umaAvaliacao->flexoes=$_POST["flexoes"];
					$umaAvaliacao->abdominais=$_POST["abdominais"];			

					$umaAvaliacao->setAltura($_POST["altura"]);
					$umaAvaliacao->setPeso($_POST["peso"]);
					
					if($umaAvaliacao->salvar())
					{
						echo("<script type=\"text/javascript\">location.href = \"avaliacoes_resultado.php?codigo=$umaAvaliacao->codigo\";</script>");
					}else
					{
						//TODO: Corrigir e implementar a lógica num fonte separado
						echo("não salvou");			
					}								
				}
			?>
		</div>		
	</body>
	<script src="bootstrap/js/jquery-1.11.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>	
</html>