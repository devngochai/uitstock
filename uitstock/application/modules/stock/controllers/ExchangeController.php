<?php
class ExchangeController extends ZendStock_Controller_Action {
	public $config;
	public $widgetMapper;	
	public $playerMapper;		
    
	public function init() {  
		 if (!isset($_SESSION['player_log'])) 
		 	$this->_redirect('auth/login/');
		 			   			 			 	
		 $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		  			     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(2); 
		 $dirTheme = $themeMapper->checkThemeStock();		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);
	
	     $_SESSION['nav-main'] = 'Trang chủ';		    

	     $this->widgetMapper = new Cloud_Model_Widget_CloudWidgetMapper();	     	  
	     $this->playerMapper = new Cloud_Model_Player_CloudPlayerMapper();   	 
	     	     			
		 $this->request = $this->getRequest();

		 $menuItemMapper = new Cloud_Model_MenuItem_CloudMenuItemMapper();		 		 		 
		 
		 $this->view->assign(array(			
    		'widgets' => $this->widgetMapper->getWidgetByComponentPage(2, 'exchange'),
    		'menuItemMapper' => $menuItemMapper,
		 	'items' => $menuItemMapper->getItemByCat(4),
		 	'playerMapper' => new Cloud_Model_Player_CloudPlayerMapper(),
		 	'session' => new Cloud_Model_PlayerSession_CloudPlayerSessionMapper(),		 		
     	));		 
	}		

	public function orderAction()
	{
		$this->view->headTitle($this->config['title']['Exchange']);												 	    	    				    
} 	 

	public function successOrderAction()
	{	
		$this->view->headTitle($this->config['title']['SuccessOrder']);											 	    	    				    
	}

	public function failOrderAction()
	{
		$this->view->headTitle($this->config['title']['FailOrder']);												 	    	    				    
	}	
	
	public function orderHistoryAction()
	{
		$this->view->headTitle($this->config['title']['OrderHistory']);												 	    	    			    
	}

	public function portfolioAction()
	{
		$this->view->headTitle($this->config['title']['Portfolio']);												 	    	    			    
	}

	public function rebuildAccountAction()
	{
		$this->view->headTitle($this->config['title']['RebuildAccount']);												 	    	    			    
	}	
}