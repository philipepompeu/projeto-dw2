<?php
	require_once("acessaDados.php");
	
	class Cliente{
		
		public $id;
		public $nome;
		public $cpf;
		public $rg;
		public $logradouro;
		public $cep;
		public $bairro;
		public $numero;
		public $complemento;
		public $cidade;
		public $uf;
		public $fixo;
		public $celular;
		public $email;
		public $nascto;
		public $sexo;
		public $peso;
		public $altura;
		public $dtcadastro;	
		
		function retornarClientes () {	
		
			$resultado = array();
	
			return $resultado;
		}
	
		public static function adicionaCliente ($cliente) { //pesquisar método estático
			
			$db = BancoDeDados::PegaBancoDeDados();
			
			$sql = "INSERT INTO CLIENTES (NOME, CPF, RG, LOGRADOURO, CEP, BAIRRO, NUMERO, COMPLEMENTO, CIDADE, UF, FIXO, CELULAR, EMAIL, NASCTO, SEXO, PESO, ALTURA) 
			VALUES('".$cliente->nome."','".$cliente->cpf."','".$cliente->rg."','".$cliente->logradouro."','".$cliente->cep."','".$cliente->bairro."','".$cliente->numero."','".$cliente->complemento."','".$cliente->cidade."','".
			$cliente->uf."','".$cliente->fixo."','".$cliente->celular."','".$cliente->email."','".$cliente->nascto."','".$cliente->sexo."','".$cliente->peso."','".$cliente->altura."')";
			
			$db->exec($sql);
			
			//return $sql;	
		
		}
		
		public static function atualizaCliente ($cliente) { //pesquisar método estático
			
			$db = BancoDeDados::PegaBancoDeDados();
			
			$sql = "UPDATE CLIENTES SET NOME='".$cliente->nome.
			"',CPF='".$cliente->cpf.
			"',RG='".$cliente->rg.
			"',LOGRADOURO='".$cliente->logradouro.
			"',CEP='".$cliente->cep.
			"',BAIRRO='".$cliente->bairro.
			"',NUMERO='".$cliente->numero.
			"',COMPLEMENTO='".$cliente->complemento.
			"',CIDADE='".$cliente->cidade.
			"',UF='".$cliente->uf.
			"',FIXO='".$cliente->fixo.
			"',CELULAR='".$cliente->celular.
			"',EMAIL='".$cliente->email.
			"',NASCTO='".$cliente->nascto.
			"',SEXO='".$cliente->sexo.
			"',PESO='".$cliente->peso.
			"',ALTURA='".$cliente->altura.
			"' WHERE ID=".$cliente->id;
			
			$db->exec($sql);
			
		
		}
		
		public static function listaClientes () { //pesquisar método estático 
		
			$db = BancoDeDados::PegaBancoDeDados();	
			
			$sql = "SELECT id,nome,cpf,rg,logradouro,cep,bairro,numero,complemento,cidade,uf,fixo,celular,email,nascto,sexo,peso,altura,dtcadastro FROM CLIENTES";
			
			$res = $db->query($sql);
			
			
			$clientes = array();
			
				while($row = $res->fetchArray()){
					
					$cliente = new Cliente;
					
					$cliente->id = $row[0];
					$cliente->nome = $row[1];
					$cliente->cpf = $row[2];
					$cliente->rg = $row[3];
					$cliente->logradouro = $row[4];
					$cliente->cep = $row[5];
					$cliente->bairro = $row[6];
					$cliente->numero = $row[7];
					$cliente->complemento = $row[8];
					$cliente->cidade = $row[9];
					$cliente->uf = $row[10];
					$cliente->fixo = $row[11];
					$cliente->celular = $row[12];
					$cliente->email = $row[13];
					$cliente->nascto = $row[14];
					$cliente->sexo = $row[15];
					$cliente->peso = $row[16];
					$cliente->altura = $row[17];
					$cliente->dtcadastro = $row[18];
					
					array_push($clientes, $cliente);				
				
				}

			return $clientes;
		
		}
		
		public static function listaCliente($id) { //pesquisar método estático 
		
			$db = BancoDeDados::PegaBancoDeDados();	
			
			$sql = "SELECT * FROM CLIENTES WHERE id = $id";
			
			$res = $db->query($sql);
			
			$cliente = new Cliente;
			
				while($row = $res->fetchArray()){				
					
					$cliente->id = $row['id'];
					$cliente->nome = $row['nome'];
					$cliente->cpf = $row['cpf'];
					$cliente->rg = $row['rg'];
					$cliente->logradouro = $row['logradouro'];
					$cliente->cep = $row['cep'];
					$cliente->bairro = $row['bairro'];
					$cliente->numero = $row['numero'];
					$cliente->complemento = $row['complemento'];
					$cliente->cidade = $row['cidade'];
					$cliente->uf = $row['uf'];
					$cliente->fixo = $row['fixo'];
					$cliente->celular = $row['celular'];
					$cliente->email = $row['email'];
					$cliente->nascto = $row['nascto'];
					$cliente->sexo = $row['sexo'];
					$cliente->peso = $row['peso'];
					$cliente->altura = $row['altura'];
					$cliente->dtcadastro = $row['dtcadastro'];
					
				}

			return $cliente;
		
		}
		
		public static function deletaCliente ($id) { //pesquisar método estático
			
			$db = BancoDeDados::PegaBancoDeDados();	
			
			$sql = "DELETE FROM CLIENTES WHERE ID=".$id;
			
			$db->exec($sql);
			
				
		
		}
		
		
	}
?>