<?php
	require_once("acessaDados.php");	
	class menuItem{
		public $codigo;
		public $descricao;
		public $pagina;
		private $pai;
		
		public static function pegarItensMenu($codigoPai)
		{
		
			$resultado  = array();
			
			$mydb = BancoDeDados::PegaBancoDeDados();			
			
			$sql  = "SELECT CODIGO,DESCRICAO,PAGINA FROM MENU WHERE MENU =".$codigoPai." AND CODIGO <> 0;";
			
			$result = $mydb->query($sql);
			
			while($valores = $result->fetchArray()) {
				$umMenu = new menuItem();
				$umMenu->codigo 	= $valores[0];
				$umMenu->descricao	= $valores[1];
				$umMenu->pagina		= $valores[2];
				
				array_push($resultado,$umMenu);
			}
			
			$mydb->close();
			return $resultado;
		}

		public function salvar($pai)
		{
			$this->pai = $pai;
			
			$mydb = BancoDeDados::PegaBancoDeDados();
			$sql = "INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES (";			
			$nextId  = BancoDeDados::getNextId('MENU');
			$sql .=	$nextId. ",";
			$sql .=	"'".$this->descricao . "',";
			$sql .=	$this->pai->codigo.",";
			$sql .=	"'". $this->pagina ."');";	
			
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
	}
?>