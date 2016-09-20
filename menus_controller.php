<?php
	require('funcoes.php');	
	require_once('/classes/menuHeader.php');		
	require_once('/classes/menuItem.php');
	try 
	{
		if(isset($_GET['action']))
		{			
			if($_GET['action'] == '1')
			{				
				$novoMenu = new menuHeader();
				$novoMenu->descricao = $_POST['descricao'];
				$contador = 1;
				while(isset($_POST['descricao'.$contador]) && isset($_POST['pagina'.$contador]))				
				{
					$novoItem  = new menuItem();
					$novoItem->descricao = $_POST['descricao'.$contador];
					$novoItem->pagina = $_POST['pagina'.$contador];					
					array_push($novoMenu->listaMenuItem,$novoItem);
					$contador++;
				}
				if($novoMenu->salvar())
				{
					RedirecionarPara('menus_listar.php');
				}else
				{
					throw new Exception("nao salvou");
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