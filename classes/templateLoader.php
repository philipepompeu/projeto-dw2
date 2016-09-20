<?php
	require_once('/lib/twig/Autoloader.php');	
	require_once('/classes/menuHeader.php');	
	class TemplateLoader
	{		
		protected $template;
		private $variaveis;
		private $loader;
		private $twig;
		
		function __construct()
		{			
			Twig_Autoloader::register();
			$this->AdicionaVariavel('menuGeral',menuHeader::pegarMenu());			
			$this->template = null;			
			$this->loader = null;
			$this->twig = null;
		}
		
		public function CarregarTemplate($nomeTemplate)
		{		
			if($this->loader == null)
			{
				$this->loader = new Twig_Loader_Filesystem('views');	
			}
			
			if($this->twig == null)
			{
				$this->twig = new Twig_Environment($this->loader, array());		
			}
			
			$this->template = $this->twig->loadTemplate($nomeTemplate);
		}
		
		public function AdicionaVariavel($nomeVariavel,$valor)
		{			
			if($this->variaveis == null)
			{
				$this->variaveis = array();
			}			
			$this->variaveis[$nomeVariavel] = $valor; 	
		}
		
		public function ConstruirTemplate()
		{
			if($this->template != null)
			{
				echo $this->template->render($this->variaveis);
			}	
		}
	}	
?>