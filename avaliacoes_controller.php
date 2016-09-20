<?php
	require('funcoes.php');
	require_once('/classes/avaliacao.php');	
	try 
	{
		$mensagem = '';
		if(isset($_GET['action']))
		{
			if($_GET['action'] == '1')
			{				
				
				$variaveisObrigatorias = array();
				array_push($variaveisObrigatorias,"codCliente");
				array_push($variaveisObrigatorias,"codAvaliador");
				array_push($variaveisObrigatorias,"data");
				array_push($variaveisObrigatorias,"observacao");
				array_push($variaveisObrigatorias,"glicemia");
				array_push($variaveisObrigatorias,"historicoDiabetes");
				array_push($variaveisObrigatorias,"historicoCardiaco");
				array_push($variaveisObrigatorias,"fumante");
				array_push($variaveisObrigatorias,"genero");
				array_push($variaveisObrigatorias,"idade");
				array_push($variaveisObrigatorias,"flexoes");
				array_push($variaveisObrigatorias,"abdominais");
				array_push($variaveisObrigatorias,"altura");
				array_push($variaveisObrigatorias,"peso");
				
				if(ValidarRequisicao($variaveisObrigatorias,$mensagem)){
					
					$umaAvaliacao = new Avaliacao();			
					
					$umaAvaliacao->codigoCliente 		= $_POST["codCliente"];
					$umaAvaliacao->codigoAvaliador		= $_POST["codAvaliador"];
					$umaAvaliacao->data					= $_POST["data"];
					$umaAvaliacao->observacao			= $_POST["observacao"];					
					$umaAvaliacao->pressao				= $_POST["pressao"];
					$umaAvaliacao->glicemia				= $_POST["glicemia"];
					$umaAvaliacao->historicoDiabetes	= $_POST["historicoDiabetes"];
					$umaAvaliacao->historicoCardiaco	= $_POST["historicoCardiaco"];		
					$umaAvaliacao->isFumante			= $_POST["fumante"];
					$umaAvaliacao->genero				= $_POST["genero"];
					$umaAvaliacao->idade				= $_POST["idade"];
					$umaAvaliacao->flexoes				= $_POST["flexoes"];
					$umaAvaliacao->abdominais			= $_POST["abdominais"];
					
					$umaAvaliacao->setAltura($_POST["altura"]);
					$umaAvaliacao->setPeso($_POST["peso"]);
					
					if($umaAvaliacao->salvar())
					{							
						RedirecionarPara('avaliacoes_listar.php');				
					}else
					{
						throw new Exception("nao salvou");										
					}			
				}else
				{
					throw new Exception($mensagem);					
				}
			}else
			{				
				if(isset($_POST["Excluir"]))
				{
					throw new Exception('not implemented');
				}else
				{
					throw new Exception('not implemented');
				}				
			}
		}else
		{
			throw new Exception('Inválido');
		}
	}catch (Exception $e)
	{    
		MostrarPaginaDeErro($e->getMessage());
	}	
	
	/*if($_POST["Excluir"])
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
	
	if(isset($_POST["codCliente"]))
				{
					$umaAvaliacao = new Avaliacao();			
					$umaAvaliacao->codigoCliente = $_POST["codCliente"];
					$umaAvaliacao->codigoAvaliador=$_POST["codAvaliador"];
					$umaAvaliacao->data=$_POST["data"];
					$umaAvaliacao->observacao=$_POST["observacao"];
					
					$umaAvaliacao->pressao=$_POST["pressao"];
					$umaAvaliacao->glicemia=$_POST["glicemia"];
					$umaAvaliacao->historicoDiabetes=$_POST["historicoDiabetes"];
					$umaAvaliacao->historicoCardiaco=$_POST["historicoCardiaco"];		
					$umaAvaliacao->isFumante=$_POST["fumante"];
					$umaAvaliacao->genero=$_POST["genero"];
					$umaAvaliacao->idade=$_POST["idade"];
					$umaAvaliacao->flexoes=$_POST["flexoes"];
					$umaAvaliacao->abdominais=$_POST["abdominais"];			

					$umaAvaliacao->setAltura($_POST["altura"]);
					$umaAvaliacao->setPeso($_POST["peso"]);
					
					if($umaAvaliacao->salvar())
					{
						echo("<script type=\"text/javascript\">location.href = \"avaliacoes_resultado.php?codigo=$umaAvaliacao->codigo\";</script>");
					}else
					{
						//TODO: Corrigir e implementar a lógica num fonte separado
						echo("não salvou");			
					}								
				}*/
?>