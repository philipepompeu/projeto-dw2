<html>
<?php
	require('funcoes.php');
	if($_POST["Salvar"])
	{
		if(isset($_POST["codigo"]))
		{
			$umAvaliador = new Avaliador();
			$umAvaliador->codigo = $_POST["codigo"];
			$umAvaliador->nome = $_POST["nome"];
			$umAvaliador->endereco = $_POST["endereco"];
			$umAvaliador->email = $_POST["email"];
			$umAvaliador->telefone = $_POST["telefone"];
			
			if($umAvaliador->update())
			{
				echo("<script type=\"text/javascript\">location.href = \"avaliadores_listar.php\";</script>");			
			}else
			{
				echo("<script type=\"text/javascript\">location.href = \"avaliadores_alterar.php?codigo=$umAvaliador->codigo\";</script>");
			}			
		}else
		{
			echo("<script type=\"text/javascript\">location.href = \"avaliadores_listar.php\";</script>");
		}	
	}
	elseif($_POST["Excluir"])
	{
		if(isset($_POST["codigo"]))
		{
			$umAvaliador = new Avaliador();
			$umAvaliador->codigo = $_POST["codigo"];
			
			if($umAvaliador->delete())
			{
				echo("<script type=\"text/javascript\">location.href = \"avaliadores_listar.php\";</script>");			
			}else
			{
				echo("<script type=\"text/javascript\">location.href = \"avaliadores_alterar.php?codigo=$umAvaliador->codigo\";</script>");
			}			
		}else
		{
			echo("<script type=\"text/javascript\">location.href = \"avaliadores_listar.php\";</script>");
		}
	}

?>
</html>