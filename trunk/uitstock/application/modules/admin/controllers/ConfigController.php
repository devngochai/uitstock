<?php
class Admin_ConfigController extends ZendStock_Controller_Action {
	public $config;		
	public $privileges;
    
	public function init() {    	
		 if (!isset($_SESSION['log']))
		 	$this->_redirect('admin/index/error');
		 				 
		 $this->privileges = $_SESSION['privilege'];
		 
		 $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		
		 $componentMapper = new Cloud_Model_Component_CloudComponentMapper();	     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(1); 
		 $dirTheme = $themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    	        	    		 		 				 		 				
	}			
	
	public function visitstaticsAction() {		 		 
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 1) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['visit']);
		
		$playerMapper = new Cloud_Model_Player_CloudPlayerMapper();
		$playerSessionMapper = new Cloud_Model_PlayerSession_CloudPlayerSessionMapper();
		$playerPage = 1;
		$playerNumber = 1;				
		$playerLink = '';
		$imgDir = $this->config['dirImg'];
		
		 $this->view->assign(array(	    		    	    		         
			'players' => $playerMapper->fetchUserOnline(0 ,5),		
		 	'playerMapper' => $playerMapper,
		 	'playerPaging' => $playerMapper->showPaging($playerPage, $playerNumber, $playerLink, $imgDir),			 			 			 		    	   		    
	    ));			
	}
	
	public function fileManagerAction()
	{
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 3) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['fileManager']);	
	}
	
	public function configurationAction() {
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 5) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		
		$this->view->headTitle($this->config['title']['configuration']);		
	}
}