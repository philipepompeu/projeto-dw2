<?php
	require_once('/classes/templateLoader.php');
	require_once('/classes/avaliacao.php');	
	$template = new TemplateLoader();
	$template->CarregarTemplate('avaliacoes_listar.html');		
	$template->AdicionaVariavel('header', array('Código','Cliente','Avaliador','Data','Detalhes'));
	$template->AdicionaVariavel('umaListaDeAvaliacoes', Avaliacao::retornarAvaliacoes());
	$template->ConstruirTemplate();	
?>