<html>
	<body>
		<?php			
			require_once('funcoes.php');			
			try
			{
				$consulta = "select * from MENU";
				$params = array();
				$result = BancoDeDados::ExecutaComando($consulta,$params);
			}catch (Exception $e)
			{    
				MostrarPaginaDeErro($e->getMessage());
			}		
		?>
	</body>
<html>
	