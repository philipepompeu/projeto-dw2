<?php
	require_once("acessaDados.php");
	
	class Avaliador{		
		public $codigo;
		public $nome;
		public $endereco;
		public $telefone;
		public $email;			
	
		public static function retornarAvaliadores () 
		{
			$resultado  = array();
			
			$mydb = BancoDeDados::PegaBancoDeDados();	
			
			$sql  = "SELECT CODIGO,NOME,ENDERECO,TELEFONE,EMAIL FROM AVALIADORES;";
			
			$result = $mydb->query($sql);
			
			while($valores = $result->fetchArray()) {
				$umAvaliador = new Avaliador();
				$umAvaliador->codigo 	= $valores[0];
				$umAvaliador->nome 		= $valores[1];
				$umAvaliador->endereco	= $valores[2];
				$umAvaliador->telefone	= $valores[3];		
				$umAvaliador->email		= $valores[4];	
				
				array_push($resultado,$umAvaliador);
			}
			$mydb->close();
			return $resultado;
		}	
		
		public function carregarDados () 
		{			
			if(!empty($this->codigo))
			{
				$mydb = BancoDeDados::PegaBancoDeDados();	
				
				$sql  = "SELECT CODIGO,NOME,ENDERECO,TELEFONE,EMAIL FROM AVALIADORES WHERE CODIGO = ".$this->codigo.";";
				
				$result = $mydb->query($sql);
				
				$valores = $result->fetchArray();				
				$this->nome 	= $valores[1];
				$this->endereco	= $valores[2];
				$this->telefone	= $valores[3];		
				$this->email	= $valores[4];
				$mydb->close();			
			}
		}		
			
		
		public static function getNextId($mydb)
		{
			return $mydb->querySingle('SELECT COUNT(*) + 1 FROM AVALIADORES');
		}
		
		function salvar() {
			$mydb = BancoDeDados::PegaBancoDeDados();						
				
			$sql = "INSERT INTO AVALIADORES(codigo,nome,endereco,telefone,email) values (";
			$classe =  'Avaliador';
			$nextId  = $classe::getNextId($mydb);
			$sql .=	$nextId. ",";
			$sql .=	"'".$this->nome . "',";
			$sql .=	"'".$this->endereco . "',";
			$sql .=	"'".$this->telefone . "',";
			$sql .=	"'".$this->email . "');";
			
			if($mydb->exec($sql))
			{
				$this->codigo = $nextId;
				$mydb->close();
				return true;
			}else
			{
				$mydb->close();
				return false;
			}			
		}
		
		function update()
		{		
			$mydb = BancoDeDados::PegaBancoDeDados();						
				
			$sql = "UPDATE AVALIADORES ";			
			$sql .=	"set nome = '".$this->nome. "',";
			$sql .=	"endereco = '".$this->endereco. "',";
			$sql .=	"telefone = '".$this->telefone. "'," ;
			$sql .=	"email = '".$this->email. "' ";
			$sql .=	"where  codigo = ".$this->codigo.";";	
			$result  = $mydb->exec($sql);
			if(!$result)
			{
				throw new Exception($mydb->lastErrorMsg() . $sql);
			}
			$mydb->close();
			return($result);		
		}
		
		function delete()
		{
			$mydb = BancoDeDados::PegaBancoDeDados();							
				
			$sql = "DELETE FROM AVALIADORES ";
			$sql .=	"WHERE  CODIGO = ".$this->codigo.";";	
			if($mydb->exec($sql))
			{
				$mydb->close();	
				$this->codigo = null;
				return true;
			}else
			{
				$mydb->close();	
				return false;
			}					
		}
		
	}
?>