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
									
									$cliente->id = $_POST['id'];
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
									
									$cliente::atualizaCliente($cliente);
								}
								
								header('Location: clientes_listar.php');
								
								
				?>