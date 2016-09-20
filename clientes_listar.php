<?php
	require_once('/classes/templateLoader.php');
	require_once('/classes/cliente.php');
	$template = new TemplateLoader();
	$template->CarregarTemplate('clientes_listar.html');	
	$template->AdicionaVariavel('header', array('Código','Nome','Celular','E-mail','Detalhes'));	
	$clientes = new Cliente();
	$template->AdicionaVariavel('umaLista', $clientes::listaClientes());	
	$template->ConstruirTemplate();	
?>