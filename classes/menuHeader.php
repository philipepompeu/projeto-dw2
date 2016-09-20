<?php
	require_once("acessaDados.php");
	require_once("classes\menuItem.php");
	
	class menuHeader{
		public $codigo;
		public $descricao;		
		public $listaMenuItem = array();		
		
		
		public function carregarDados()
		{	
			
			$mydb = BancoDeDados::PegaBancoDeDados();
			
			$sql  = "SELECT CODIGO,DESCRICAO,PAGINA FROM MENU WHERE MENU = 0 AND CODIGO <> 0 AND CODIGO = :codigo ;";			
			
			$clausula =	$mydb->prepare($sql);			
			$clausula->bindValue('codigo',$this->codigo);			
			$result = $clausula->execute();
			
			$valores = $result->fetchArray();				
				
			$this->descricao	= $valores[1];								
			$this->carregarItens();	
			
			
			
			$mydb->close();
			return true;
		}
		
		public static function pegarMenu()
		{
			$resultado  = array();
			
			$mydb = BancoDeDados::PegaBancoDeDados();
			
			$sql  = "SELECT CODIGO,DESCRICAO,PAGINA FROM MENU WHERE MENU = 0 AND CODIGO <> 0;";			
			$result = $mydb->query($sql);
			
			while($valores = $result->fetchArray()) {
				$umMenu = new menuHeader();
				$umMenu->codigo 	= $valores[0];
				$umMenu->descricao	= $valores[1];								
				$umMenu->carregarItens();
								
				array_push($resultado,$umMenu);
			}
			
			$mydb->close();
			return $resultado;
		}

		public function carregarItens()
		{
			$this->listaMenuItem  = menuItem::pegarItensMenu($this->codigo);
		}
		
		public function salvar()
		{
			$mydb = BancoDeDados::PegaBancoDeDados();
			$sql = "INSERT INTO MENU(CODIGO,DESCRICAO,MENU,PAGINA) VALUES (";			
			$nextId  = BancoDeDados::getNextId('MENU');
			$sql .=	$nextId. ",";
			$sql .=	"'".$this->descricao . "',";
			$sql .=	"0,'');";	
			
			if($mydb->exec($sql))
			{
				$this->codigo = $nextId;
				foreach ($this->listaMenuItem as &$menuItem)
				{
					$menuItem->salvar($this);
				}
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