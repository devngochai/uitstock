<?php
class Admin_StockController extends ZendStock_Controller_Action {
	public $config;
    
	public function init() {      			     	           
	     $dirTemplate = '/admin/templates/default';		 
		 $dirTheme = '/admin/themes/default';		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);   		    
	}
	
	public function stockAction() {			      
	     $this->view->headTitle($this->config['title']['stock']);	
	     $_SESSION['log'] = true;	     		
	}	
	
	public function analyzeAction() {			      
	     $this->view->headTitle($this->config['title']['analyze']);	
	     $_SESSION['log'] = true;	     		
	}
	
	public function exchangeAction() {			      
	     $this->view->headTitle($this->config['title']['exchange']);	
	     $_SESSION['log'] = true;	     		
	}
}