<?php	
	require_once('funcoes.php');	
	require_once('/classes/templateLoader.php');	
	$template = new TemplateLoader();
	$template->CarregarTemplate('errorpage.html');
	$template->AdicionaVariavel('mensagemDeErro',PegarUltimaMensagemDeErro());	
	$template->ConstruirTemplate();
?>