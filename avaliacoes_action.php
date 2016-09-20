<html>
<?php
	require('funcoes.php');	
	if($_POST["Excluir"])
	{
		if(isset($_POST["codigo"]))
		{			
			$umaAvaliacao = new Avaliacao();
			$umaAvaliacao->codigo = $_POST["codigo"];
			
			if($umaAvaliacao->delete())
			{
				echo("<script type=\"text/javascript\">location.href = \"avaliacoes_listar.php\";</script>");			
			}else
			{
				echo("<script type=\"text/javascript\">location.href = \"avaliacoes_resultado.php?codigo=$umaAvaliacao->codigo\";</script>");
			}			
		}else
		{
			echo("<script type=\"text/javascript\">location.href = \"avaliacoes_listar.php\";</script>");
		}
	}
?>
</html>