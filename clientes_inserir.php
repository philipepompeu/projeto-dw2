<!DOCTYPE html>

<?php	
								
								$submit = false;
								$erro = null;
								
								if (isset($_POST) && !empty($_POST)) {
									
									if(strlen($_POST["nome"]) < 5) {
										$erro = "Preencha o campo nome com ao menos 5 caracteres";
									}
									else if(!preg_match('/[0-9]{11}/', $_POST["cpf"])) {
										$erro = "Preencha o campo CPF com ao menos 11 caracteres (apenas números)";
									}
									else if(!preg_match('/[0-9]{9}/', $_POST["rg"])) {
										$erro = "Preencha o campo RG com ao menos 9 caracteres (apenas números)";
									}
									else if(!preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $_POST["nascto"])) {
										$erro = "Informe sua data de nascimento";
									}
									else if(!isset($_POST["sexo"])) {
										$erro = "Preencha o campo sexo";
									}
									else if(empty($_POST["peso"])) {
										$erro = "Informe o seu peso";
									}
									else if(empty($_POST["altura"])) {
										$erro = "Informe a sua altura";
									}
									else if(!preg_match('/[0-9]{8}/', $_POST["cep"])) {
										$erro = "Informe um CEP válido";
									}
									else if(empty($_POST["logradouro"])) {
										$erro = "Informe o seu logradouro";
									}
									else if(!is_numeric($_POST["numero"])) {
										$erro = "Informe o número de sua residência";
									}
									else if(empty($_POST["bairro"])) {
										$erro = "Informe o bairro";
									}
									else if(empty($_POST["cidade"])) {
										$erro = "Informe a cidade";
									}
									else if(empty($_POST["uf"])) {
										$erro = "Informe o estado";
									}
									else if(!preg_match('/[0-9]{11}/', $_POST["celular"])) {
										$erro = "Informe um celular válido";
									}
									else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
										$erro = "Informe um e-mail válido";
									}								
									else {
										$submit = true;
									}
									
								}
								
								require('funcoes.php');
								
								$cliente = new Cliente;
								
								if ($submit) {
									
									$cliente->nome = $_POST['nome'];
									$cliente->cpf = $_POST['cpf'];
									$cliente->rg = $_POST['rg'];
									$cliente->logradouro = $_POST['logradouro'];
									$cliente->cep = $_POST['cep'];
									$cliente->bairro = $_POST['bairro'];
									$cliente->numero = $_POST['numero'];
									$cliente->complemento = $_POST['complemento'];
									$cliente->cidade = $_POST['cidade'];
									$cliente->uf = $_POST['uf'];
									$cliente->fixo = $_POST['fixo'];
									$cliente->celular = $_POST['celular'];
									$cliente->email = $_POST['email'];
									$cliente->nascto = $_POST['nascto'];
									$cliente->sexo = $_POST['sexo'];
									$cliente->peso = $_POST['peso'];
									$cliente->altura = $_POST['altura'];
									
									$cliente::adicionaCliente($cliente);
								}
								
								
				?>




<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Academia</title>		
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script type="text/javascript" src="cep.js"></script>
		
		<script src="bootstrap/js/jquery-1.11.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="bootstrap/js/jquery-1.11.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		
		<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/src/js/bootstrap-datetimepicker.js"></script>
	
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
				<h1>Cadastro de Clientes</h1>
			</div>
			
			<form action="clientes_inserir.php" role="form" method="POST">

			<div class="form-group">
				<?php echo '<p class="bg-warning">'.$erro.'</p>';?>
			</div>

				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Dados pessoais</h3>
					</div>
					<div class="panel-body">
					
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="text" name="nome" class="form-control" required="required" minlength="5">
							
						</div>
						
						<div class="form-group">
							<label for="cpf">CPF:</label>
							<input type="text" name="cpf"  class="form-control" pattern="[0-9]+$" required="required" minlength="11" placeholder="Somente números" 
							title="Este campo é obrigatório. Utilize apenas números!" >
						</div>
						
						<div class="form-group">
							<label for="nome">RG:</label>
							<input type="text" name="rg"  class="form-control" pattern="[0-9]+$" required="required" minlength="9" placeholder="Somente números"
							title="Este campo é obrigatório. Utilize apenas números!" >
						</div>
						
						<div class="form-group">
							<label for="nascto">Data de nascimento:</label>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<div class="input-group date" id="nascto">
											<input name="nascto" type="text" id="nascto" class="form-control" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" required="required" placeholder="DD/MM/AAAA"
											title="Este campo é obrigatório. Obedeça o formato DD/MM/AAAA!"   />
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</div>
								</div>
								<script type="text/javascript">
									$(function () {
										$("#nascto").datetimepicker({
											locale: "pt-br",
											format: "DD/MM/YYYY"
										});
									});
								</script>
								</div>
							
						</div>
						
						<div class="form-group">
							<label for="sexo">Sexo</label>
							<div class="radio">						
								<label><input type="radio" name="sexo" id="sexoM" value="M" checked>Masculino</label>
								<label><input type="radio" name="sexo" id="sexoF" value="F">Feminino</label>
							</div>
						</div>
						
						<div class="form-group">
							<label for="peso">Peso (kg):</label>
							<input type="number" name="peso" step="0.1" min="40"  class="form-control" required="required">
						</div>
						
						<div class="form-group">
							<label for="altura">Altura (m):</label>
							<input type="number" name="altura" step="0.01" min="1"  class="form-control" required="required">
						</div>						
						
					</div>
				</div>
				
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Endereço</h3>
					</div>
					<div class="panel-body">
					
						<div class="form-group">
							<label for="cep">CEP:</label>
							<input type="text" name="cep" id="cep" maxlength="8" class="form-control" placeholder="Somente números" pattern="[0-9]+$" required="required"
							title="Este campo é obrigatório. Utilize apenas números!" >
						</div>
						
						<div class="form-group">
							<label for="logradouro">Logradouro:</label>
							<input type="text" name="logradouro" id="logradouro" size="45"  class="form-control" required="required">
						</div>
						
						<div class="form-group">
							<label for="numero">Número:</label>
							<input type="text" name="numero" id="numero" size="5"  class="form-control" placeholder="Somente números" pattern="[0-9]+$" required="required"
							title="Este campo é obrigatório. Utilize apenas números!" >
						</div>
						
						<div class="form-group">
							<label for="complemento">Complemento:</label>
							<input type="text" name="complemento" id="complemento" size="5"  class="form-control" placeholder="Ex.: Antigo 8, APTO 301 etc">
						</div>
						
						<div class="form-group">
							<label for="bairro">Bairro:</label>
							<input type="text" name="bairro" id="bairro" size="25"  class="form-control" required="required" 
							title="Este campo é obrigatório.">
						</div>
						
						<div class="form-group">
							<label for="cidade">Cidade:</label>
							<input type="text" name="cidade" id="cidade" size="25"  class="form-control" required="required"
							title="Este campo é obrigatório.">
						</div>
						
						<div class="form-group">
							<label for="uf">Estado:</label>
							<input type="text" name="uf" id="uf" size="2"  class="form-control" required="required"
							title="Este campo é obrigatório.">
						</div>
					</div>
				</div>
				
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Contatos</h3>
					</div>
					<div class="panel-body">
					
						<div class="form-group">
							<label for="telefone">Telefone:</label>
							<input type="text" name="fixo" id="fixo" class="form-control" placeholder="Somente números e com DDD" required="required"
							title="Este campo é obrigatório. Utilize apenas números!" minlength="10" >
						</div>
						
						<div class="form-group">
							<label for="celular">Celular:</label>
							<input type="text" name="celular" id="celular" class="form-control" placeholder="Somente números e com DDD" required="required"
							title="Este campo é obrigatório. Utilize apenas números!" minlength="10" maxlength="11" >
						</div>
						
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="email" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required" >
						</div>
						
						
					</div>
				</div>
				
				
				
				<p>
					<input type="submit" value="Cadastrar" class="btn btn-primary btn-lg">
				</p>
				
				
			</form>
			
			
			
			
			
			
			
			
			
		</div>
	</body>
	    
</html>