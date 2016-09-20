<?php
	require("classes\acessaDados.php");
	require_once("classes\cliente.php");
	require_once("classes\avaliacao.php");

	function RedirecionarPara($url)
	{
		header("Location: ".$url);
	}
	
	function MostrarPaginaDeErro($erro)
	{
		session_start();
		$_SESSION["ultimaMensagemDeErro"]=$erro;
		RedirecionarPara('errorpage.php');
	}
	
	function PegarUltimaMensagemDeErro()
	{	
		session_start();		
		return ($_SESSION["ultimaMensagemDeErro"]);
	}
	
	function ValidarRequisicao($variaveisObrigatorias = array(),&$mensagem, $tipo = 'POST')
	{
		$validado = true;
		$mensagem = 'Variável não especificada. Nome da Variável : ';
		foreach ($variaveisObrigatorias as &$variavel) 
		{
			
			if($tipo == 'POST')
			{
				if(!(isset($_POST[$variavel])))
				{
					$validado = false;
					$mensagem.=$variavel;
					break;
				}
			}elseif($tipo == 'GET')
			{
				if(!(isset($_GET[$variavel])))
				{
					$validado = false;
					$mensagem.=$variavel;
					break;
				}
			}		
		}		
		return $validado;
	}
?>