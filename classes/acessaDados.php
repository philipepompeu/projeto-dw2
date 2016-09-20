<?php
	require_once("classes\parametro.php");
	class BancoDeDados
	{		
		private static $diretorio = 'lib\data';
		private static $nomeBancoDeDados = 'lib\data\banco.sqlite3';		
		
		public static function ExecutaComando($consulta = '',$params = array(),$mydb = null)		
		{		
			
			$fechaConexao = true;
			if($mydb == null)
			{
				$mydb = BancoDeDados::PegaBancoDeDados();
			}else
			{
				$fechaConexao = false;
			}
			
			$clausula =	$mydb->prepare($consulta);
			
			if($clausula->paramCount() == count($params))
			{
				foreach ($params as &$parametro)
				{
					$clausula->bindValue($parametro->nome,$parametro->GetValor(),$parametro->GetTipo());
				}
			}else
			{					
				throw new Exception("Número de parametros informados diverge da quantidade necessária.");
			}
			
			if(!$clausula->readOnly())
			{
				$resultado = $clausula->execute();
				if($fechaConexao)
				{							
					$mydb->close();				
				}
			}else
			{
				throw new Exception("Função não executa consultas.");
			}			
			return $resultado;			
		}
		
		public static function PegaBancoDeDados()
		{
			$mydb = Null;
			
			$dir = BancoDeDados::$diretorio;
			
			if (!file_exists($dir) && !is_dir($dir)) {
				mkdir($dir);         
			}
			
			if(!file_exists (BancoDeDados::$nomeBancoDeDados))
			{
				$mydb = new sqlite3(BancoDeDados::$nomeBancoDeDados);
				
				$mydb->exec('BEGIN TRANSACTION');
				
				$sql = "CREATE TABLE USUARIOS(";		
				$sql .= 'CODIGO INT NOT NULL PRIMARY KEY,';
				$sql .= 'EMAIL VARCHAR(100) NOT NULL,';
				$sql .= 'SENHA VARCHAR(40) NOT NULL';						
				$sql .= ')';		
				$mydb->exec($sql);
				
				$sql = "INSERT INTO USUARIOS(CODIGO,EMAIL,SENHA) VALUES(0,'admin@admin','". sha1('admin') ."')";		
				$mydb->exec($sql);
				
				$sql = "CREATE TABLE MENU(";		
				$sql .= 'CODIGO INT NOT NULL PRIMARY KEY,';
				$sql .= 'DESCRICAO VARCHAR(100) NOT NULL,';
				$sql .= 'MENU INT DEFAULT 0,';
				$sql .= 'PAGINA VARCHAR(100)';						
				$sql .= ')';		
				$mydb->exec($sql);				
				
				$menu  = array();
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(0,'DEFAULT',0,'')");
				
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(1,'Clientes',0,'')");
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(2,'Inserir',1,'clientes_inserir.php')");
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(3,'Listar',1,'clientes_listar.php')");
				
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(4,'Avaliadores',0,'')");
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(5,'Inserir',4,'avaliadores_view.php')");
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(6,'Listar',4,'avaliadores_listar.php')");
				
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(7,'Avaliações',0,'')");
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(8,'Inserir',7,'avaliacoes_view.php')");
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(9,'Listar',7,'avaliacoes_listar.php')");
				
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(10,'Menus',0,'')");
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(11,'Inserir',10,'menus_view.php')");
				array_push($menu,"INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES(12,'Listar',10,'menus_listar.php')");
				
				foreach ($menu as &$insert) 
				{
					if(!BancoDeDados::ExecutaComando($insert,array(),$mydb))
					{
						throw new Exception('Não foi possível iniciar e dar a carga inicial para o funcionamento do sistema!');
					}					
				}
				
				$sql = "CREATE TABLE AVALIADORES(";		
				$sql .= 'CODIGO INT NOT NULL PRIMARY KEY,';		
				$sql .= 'NOME VARCHAR(100) NOT NULL,';
				$sql .= 'ENDERECO VARCHAR(100),';
				$sql .= 'TELEFONE VARCHAR(100),';
				$sql .= 'EMAIL VARCHAR(100)';		
				$sql .= ')';		
				$mydb->exec($sql);		
				
				$sql = "CREATE TABLE AVALIACOES(";		
				$sql .= 'CODIGO INT NOT NULL PRIMARY KEY,';		
				$sql .= 'CODIGOCLIENTE INT,';
				$sql .= 'CODIGOAVALIADOR INT ,';
				$sql .= 'DATA VARCHAR(10),';
				$sql .= 'OBSERVACAO VARCHAR(100),';
				$sql .= 'ALTURA VARCHAR(4),';
				$sql .= 'PESO VARCHAR(4),';		
				$sql .= 'PRESSAO VARCHAR(4),';	
				$sql .= 'GLICEMIA VARCHAR(4),';	
				$sql .= 'HISTORICODIABETES VARCHAR(1),';	
				$sql .= 'HISTORICOCARDIACO VARCHAR(1),';	
				$sql .= 'FUMANTE VARCHAR(1),';
				$sql .= 'GENERO VARCHAR(1),';
				$sql .= 'IDADE VARCHAR(1),';
				$sql .= 'FLEXOES VARCHAR(4),';
				$sql .= 'ABDOMINAIS VARCHAR(4)';
				$sql .= ')';		
				$mydb->exec($sql);
				
				$sql = "CREATE TABLE CLIENTES(";
				$sql .= 'NOME VARCHAR(200),';		
				$sql .= 'CPF VARCHAR(15) ,';		
				$sql .= 'RG VARCHAR(15),';		
				$sql .= 'CELULAR VARCHAR(45),';		
				$sql .= 'FIXO VARCHAR(45),';		
				$sql .= 'EMAIL VARCHAR(45),';		
				$sql .= 'NASCTO DATE,';		
				$sql .= 'DTCADASTRO DATE DEFAULT CURRENT_DATE,';		
				$sql .= 'LOGRADOURO VARCHAR(200),';		
				$sql .= 'NUMERO VARCHAR(6),';		
				$sql .= 'COMPLEMENTO VARCHAR(100),';		
				$sql .= 'BAIRRO VARCHAR(100),';		
				$sql .= 'CIDADE VARCHAR(100),';		
				$sql .= 'UF VARCHAR(3),';		
				$sql .= 'CEP VARCHAR(9),';		
				$sql .= 'SEXO CHAR(1),';		
				$sql .= 'PESO NUMBER,';		
				$sql .= 'ALTURA NUMBER,';		
				$sql .= 'ID INTEGER PRIMARY KEY AUTOINCREMENT';		
				$sql .= ');';
				$mydb->exec($sql);
				
				$mydb->exec('COMMIT TRANSACTION');			
			}
			else
			{
				$mydb = new sqlite3(BancoDeDados::$nomeBancoDeDados);
			}			
			return $mydb;
		}

		public static function getNextId($entidade)
		{
			$mydb = BancoDeDados::PegaBancoDeDados();
			$valorDeRetorno = $mydb->querySingle('SELECT COUNT(*) + 1 FROM '.$entidade); 
			$mydb->close();
			return $valorDeRetorno;
		}
	}
?>