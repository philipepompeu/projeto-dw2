<?php	
	require_once('/classes/templateLoader.php');		
	require_once('/classes/menuHeader.php');	
	
	$template = new TemplateLoader();
	$template->CarregarTemplate('menus_view.html');	
	
	$umMenu  = new menuHeader();
	
	if(isset($_GET['codigo']))
	{		
		$umMenu->codigo = $_GET['codigo'];
		$umMenu->carregarDados();
		
		$template->AdicionaVariavel('showReturn'	, true);	
		$template->AdicionaVariavel('formReturn'	, 'menus_listar.php');
		$template->AdicionaVariavel('formAction'	, 'menus_controller.php?action=2');
		$template->AdicionaVariavel('objeto'		, $umMenu);		
		$template->AdicionaVariavel('isEditing'		, true);
		$template->AdicionaVariavel('viewName'		, 'Manutenção');		
		$template->AdicionaVariavel('listaMenuItem'	, $umMenu->listaMenuItem);		
	}else
	{				
		$template->AdicionaVariavel('showReturn'	, false);	
		$template->AdicionaVariavel('formReturn'	, 'index.php');
		$template->AdicionaVariavel('formAction'	, 'menus_controller.php?action=1');
		$template->AdicionaVariavel('objeto'		, $umMenu);		
		$template->AdicionaVariavel('isEditing'		, false);
		$template->AdicionaVariavel('viewName'		, 'Inserir');		
	}
	$template->ConstruirTemplate();		
?>