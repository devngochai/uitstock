<?php
class StocksController extends ZendStock_Controller_Action {
	public $config;			
    
	public function init() { 				  				 	   
		 $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		  			     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(2); 
		 $dirTheme = $themeMapper->getThemeDefault(2);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	     	     	     	 	     	     		 	 		         
		 $this->request = $this->getRequest();	

		 $this->view->assign(array(	    		    	    		         
		 	'playerMapper' => new Cloud_Model_Player_CloudPlayerMapper(),
		 	'session' => new Cloud_Model_PlayerSession_CloudPlayerSessionMapper(),	    	   		    
	    ));			 
	}
	
	public function hotStockAction() {			      		 				 
		$this->_helper->layout()->disableLayout();				
	} 

	public function topStockAction() {			      		 				 
		$this->_helper->layout()->disableLayout();				
	}   	
	
	public function searchPriceAction()
	{
		$this->_helper->layout()->disableLayout();
	}
	
	public function searchResultAction()
	{
		$this->_helper->layout()->disableLayout();
	}
	
	public function marketStaticsAction()
	{
		$this->_helper->layout()->disableLayout();
	}
}