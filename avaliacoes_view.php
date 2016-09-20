<?php
	require_once('/classes/templateLoader.php');
	require_once('/classes/avaliacao.php');	
	require_once('/classes/avaliador.php');	
	require_once('/classes/cliente.php');
	
	$template = new TemplateLoader();
	$template->CarregarTemplate('avaliacoes_view.html');
	
	$objeto  = new Avaliacao();	
	
	if(isset($_GET['codigo']))
	{
		$objeto->codigo = $_GET['codigo'];
		$objeto->carregarDados();
		$template->AdicionaVariavel('showReturn'	, true);	
		$template->AdicionaVariavel('formReturn'	, 'avaliacoes_listar.php');
		$template->AdicionaVariavel('formAction'	, 'avaliacoes_controller.php?action=2');			
		$template->AdicionaVariavel('isEditing'		, true);
		$template->AdicionaVariavel('viewName'		, 'Resultado');
	}else
	{	
		$template->AdicionaVariavel('showReturn'	, false);	
		$template->AdicionaVariavel('formReturn'	, 'index.php');
		$template->AdicionaVariavel('formAction'	, 'avaliacoes_controller.php?action=1');
		$template->AdicionaVariavel('objeto'		, $objeto);		
		$template->AdicionaVariavel('isEditing'		, false);
		$template->AdicionaVariavel('viewName'		, 'Inserir');			
	}
	$template->AdicionaVariavel('objeto'		, $objeto);		
	$clientes = new Cliente();
	$template->AdicionaVariavel('clientes'		, $clientes::listaClientes());
	$template->AdicionaVariavel('avaliadores'	, Avaliador::retornarAvaliadores());
	
	$template->ConstruirTemplate();	
?>