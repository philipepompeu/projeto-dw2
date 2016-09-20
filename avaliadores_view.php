<?php	
	require_once('/classes/templateLoader.php');		
	require_once('/classes/avaliador.php');	
	
	$template = new TemplateLoader();
	$template->CarregarTemplate('avaliadores_view.html');	
	
	$umAvaliador  = new Avaliador();
	
	if(isset($_GET['codigo']))
	{		
		$umAvaliador->codigo = $_GET['codigo'];
		$umAvaliador->carregarDados();
		
		$template->AdicionaVariavel('showReturn'	, true);	
		$template->AdicionaVariavel('formReturn'	, 'avaliadores_listar.php');
		$template->AdicionaVariavel('formAction'	, 'avaliadores_controller.php?action=2');
		$template->AdicionaVariavel('objeto'		, $umAvaliador);		
		$template->AdicionaVariavel('isEditing'		, true);
		$template->AdicionaVariavel('viewName'		, 'Manutenção');		
	}else
	{				
		$template->AdicionaVariavel('showReturn'	, false);	
		$template->AdicionaVariavel('formReturn'	, 'index.php');
		$template->AdicionaVariavel('formAction'	, 'avaliadores_controller.php?action=1');
		$template->AdicionaVariavel('objeto'		, $umAvaliador);		
		$template->AdicionaVariavel('isEditing'		, false);
		$template->AdicionaVariavel('viewName'		, 'Inserir');		
	}
	$template->ConstruirTemplate();		
?>