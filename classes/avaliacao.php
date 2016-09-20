<?php
	require_once("acessaDados.php");
	
	class Avaliacao{		
		public $codigo;
		public $codigoCliente;
		public $nomeCliente;
		public $codigoAvaliador;
		public $nomeAvaliador;
		public $data;
		public $observacao;
		private $altura;
		private $peso;
		public $pressao;
		public $glicemia;
		public $historicoDiabetes;
		public $historicoCardiaco;
		
		public $isFumante;
		public $genero;
		public $idade;
		public $flexoes;
		public $abdominais;	
		
		function setAltura($umaAltura)
		{
			$this->altura = floatVal($umaAltura);
		}
		
		function setPeso($umPeso)
		{
			$this->peso = floatVal($umPeso);
		}
		
		function getAltura()
		{
			return($this->altura);
		}
		
		function getPeso()
		{
			return($this->peso);
		}
		
		function getIMC()
		{		
			$valor = pow ($this->getAltura(),2);
			$IMC = 1;
			if($valor > 0){
				$IMC = ($this->getPeso()/$valor);	
			}
			return ($IMC);
		}
		public static function getNextId($mydb)
		{
			return $mydb->querySingle('SELECT COUNT(*) + 1 FROM AVALIACOES');
		}
		
		function salvar() {
			$mydb = BancoDeDados::PegaBancoDeDados();						
				
			$sql  = "INSERT INTO AVALIACOES(CODIGO,CODIGOCLIENTE,CODIGOAVALIADOR,OBSERVACAO,ALTURA,PESO,DATA,";
			$sql .= "PRESSAO,GLICEMIA,HISTORICODIABETES,HISTORICOCARDIACO,FUMANTE,GENERO,";
			$sql .= "IDADE,FLEXOES,ABDOMINAIS";
			$sql .=") VALUES (";
			
			$classe =  'Avaliacao';			
			$nextId  = $classe::getNextId($mydb);
				
			$sql .=	$nextId. ",";
			$sql .=	$this->codigoCliente . ",";
			$sql .=	$this->codigoAvaliador . ",";
			$sql .=	"'".$this->observacao . "',";
			$sql .=	"'".$this->getAltura() . "',";
			$sql .=	"'".$this->getPeso() . "',";
			$sql .=	"'".$this->data . "',";			
			$sql .=	"'".$this->pressao . "',";
			$sql .=	"'".$this->glicemia . "',";
			$sql .=	"'".$this->historicoDiabetes . "',";
			$sql .=	"'".$this->historicoCardiaco . "',";
			$sql .=	"'".$this->isFumante . "',";
			$sql .=	"'".$this->genero . "',";
			$sql .=	"'".$this->idade . "',";
			$sql .=	"'".$this->flexoes . "',";
			$sql .=	"'".$this->abdominais . "');";
			
			if($mydb->exec($sql))
			{				
				$this->codigo = $nextId;
				return true;
			}else
			{
				throw new Exception($mydb->lastErrorMsg() . $sql);
				return false;
			}			
		}
		
		function delete()
		{
			$mydb = pegaBancoDeDados();							
				
			$sql = "DELETE FROM AVALIACOES ";
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
		
		public static function retornarAvaliacoes(){
			$resultado  = array();
			
			$mydb = BancoDeDados::PegaBancoDeDados();	
			
			$sql = "SELECT A.CODIGO,CODIGOCLIENTE,CODIGOAVALIADOR,OBSERVACAO,A.ALTURA,A.PESO,DATA,";
			$sql .= "PRESSAO,GLICEMIA,HISTORICODIABETES,HISTORICOCARDIACO,FUMANTE,GENERO,";
			$sql .= "IDADE,FLEXOES,ABDOMINAIS, B.NOME,C.NOME ";
			$sql .= " FROM AVALIACOES A";
			$sql .= " LEFT JOIN AVALIADORES B ON(B.CODIGO = CODIGOAVALIADOR)";
			$sql .= " LEFT JOIN CLIENTES C ON(C.ID = CODIGOCLIENTE)";
					
			$result = $mydb->query($sql);
			
			while($valores = $result->fetchArray()) {
				$umaAvaliacao = new Avaliacao();
				$umaAvaliacao->codigo 			= $valores[0];
				$umaAvaliacao->codigoCliente 	= $valores[1];
				$umaAvaliacao->codigoAvaliador	= $valores[2];
				$umaAvaliacao->observacao		= $valores[3];
				
				$umaAvaliacao->setAltura($valores[4]);
				$umaAvaliacao->setPeso($valores[5]);
				
				$umaAvaliacao->data				= $valores[6];				
				$umaAvaliacao->pressao			= $valores[7];
				$umaAvaliacao->glicemia			= $valores[8];
				$umaAvaliacao->historicoDiabetes= $valores[9];
				$umaAvaliacao->historicoCardiaco= $valores[10];
				$umaAvaliacao->isFumante		= $valores[11];
				$umaAvaliacao->genero			= $valores[12];
				$umaAvaliacao->idade			= $valores[13];
				$umaAvaliacao->flexoes			= $valores[14];
				$umaAvaliacao->abdominais		= $valores[15];		
				$umaAvaliacao->nomeAvaliador	= $valores[16];
				$umaAvaliacao->nomeCliente		= $valores[17];
				
				array_push($resultado,$umaAvaliacao);
			}
			return $resultado;
		}
		public function carregarDados () 
		{			
			if(!empty($this->codigo))
			{
				$mydb = BancoDeDados::PegaBancoDeDados();		

				$sql = "SELECT A.CODIGO,CODIGOCLIENTE,CODIGOAVALIADOR,OBSERVACAO,A.ALTURA,A.PESO,DATA,";
				$sql .= "PRESSAO,GLICEMIA,HISTORICODIABETES,HISTORICOCARDIACO,FUMANTE,GENERO,";
				$sql .= "IDADE,FLEXOES,ABDOMINAIS, B.NOME,C.NOME ";
				$sql .= " FROM AVALIACOES A";
				$sql .= " LEFT JOIN AVALIADORES B ON(B.CODIGO = CODIGOAVALIADOR)";
				$sql .= " LEFT JOIN CLIENTES C ON(C.ID = CODIGOCLIENTE) WHERE A.CODIGO = ".$this->codigo.";";				
					
				$result = $mydb->query($sql);				
				$valores = $result->fetchArray();								
				$this->codigoCliente 	= $valores[1];
				$this->codigoAvaliador	= $valores[2];
				$this->observacao		= $valores[3];				
				$this->setAltura($valores[4]);
				$this->setPeso($valores[5]);				
				$this->data				= $valores[6];				
				$this->pressao			= $valores[7];
				$this->glicemia			= $valores[8];
				$this->historicoDiabetes= $valores[9];
				$this->historicoCardiaco= $valores[10];
				$this->isFumante		= $valores[11];
				$this->genero			= $valores[12];
				$this->idade			= $valores[13];
				$this->flexoes			= $valores[14];
				$this->abdominais		= $valores[15];	
				$this->nomeAvaliador	= $valores[16];
				$this->nomeCliente		= $valores[17];				
				$mydb->close();			
			}
		}	
	}
	
?>