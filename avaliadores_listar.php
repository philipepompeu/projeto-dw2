<?php
	require_once('/classes/templateLoader.php');	
	require_once('/classes/avaliador.php');	
	$template = new TemplateLoader();	
	$template->CarregarTemplate('avaliadores_listar.html');	
	$template->AdicionaVariavel('header'				, array('Codigo','Nome','Endereço','Telefone','E-Mail','Detalhes'));
	$template->AdicionaVariavel('umaListaDeAvaliadores'	, Avaliador::retornarAvaliadores());
	$template->ConstruirTemplate();	
?>