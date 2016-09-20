<?php
	require('funcoes.php');	
	require_once('/classes/avaliador.php');		
	try 
	{
		if(isset($_GET['action']))
		{			
			if($_GET['action'] == '1')
			{				
				if(ValidarRequisicao(array("nome","endereco","telefone","email"),$mensagem)){
						
					$umAvaliador = new Avaliador();			
					$umAvaliador->nome = $_POST["nome"];
					$umAvaliador->endereco = $_POST["endereco"];
					$umAvaliador->telefone = $_POST["telefone"];
					$umAvaliador->email = $_POST["email"];
					if($umAvaliador->salvar())
					{							
						RedirecionarPara('avaliadores_listar.php');				
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
				if($_POST["Salvar"])
				{
					if(ValidarRequisicao(array("codigo","nome","endereco","telefone","email"),$mensagem))
					{
						$umAvaliador = new Avaliador();
						$umAvaliador->codigo = $_POST["codigo"];
						$umAvaliador->nome = $_POST["nome"];
						$umAvaliador->endereco = $_POST["endereco"];
						$umAvaliador->email = $_POST["email"];
						$umAvaliador->telefone = $_POST["telefone"];
						
						if($umAvaliador->update())
						{
							RedirecionarPara('avaliadores_listar.php');	
						}else
						{
							RedirecionarPara('avaliadores_view.php?codigo='.$umAvaliador->codigo);	
						}			
					}else
					{
						throw new Exception($mensagem);	
					}	
				}
				elseif($_POST["Excluir"])
				{
					if(ValidarRequisicao(array("codigo"),$mensagem))
					{
						$umAvaliador = new Avaliador();
						$umAvaliador->codigo = $_POST["codigo"];
						
						if($umAvaliador->delete())
						{
							RedirecionarPara('avaliadores_listar.php');	
						}else
						{
							RedirecionarPara('avaliadores_view.php?codigo='.$umAvaliador->codigo);	
						}			
					}else
					{
						throw new Exception($mensagem);
					}
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
?>