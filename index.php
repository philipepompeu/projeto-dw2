<?php	
	require_once('/classes/templateLoader.php');	
	$template = new TemplateLoader();
	$template->CarregarTemplate('index.html');	
	$template->ConstruirTemplate();
?>