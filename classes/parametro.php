<?php
	class Parametro
	{
		public $nome;
		private $valor;
		private $tipo;
		
		function __construct($nome='',$valor=null)
		{	
			$this->nome = $nome;
			$this->SetValor($valor);
		}
		public function GetTipo()
		{
			return $this->tipo;
		}
		
		public function SetValor($umValor)
		{			
			$this->valor = $umValor;
			$tipo = strToLower(getType($umValor));			
			switch ($tipo) 
			{
				case "integer":
					$this->tipo = SQLITE3_INTEGER;
					break;
				case "double" :
					$this->tipo = SQLITE3_FLOAT;
					break;
				case "string":
					$this->tipo = SQLITE3_TEXT;
					break;
				case "null":
					$this->tipo = SQLITE3_NULL;
					break;					
			}
		}
		public function GetValor()
		{
			return $this->valor;
		}	
	}
?>