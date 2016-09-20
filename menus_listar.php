<?php
	require_once('/classes/templateLoader.php');
	require_once('/classes/menuHeader.php');
	
	$template = new TemplateLoader();
	
	$template->CarregarTemplate('menus_listar.html');		
	$template->AdicionaVariavel('header'			, array('Código','Descrição','Detalhes'));
	$template->AdicionaVariavel('umaListaDeMenus'	, menuHeader::pegarMenu());
	
	$template->ConstruirTemplate();
?>