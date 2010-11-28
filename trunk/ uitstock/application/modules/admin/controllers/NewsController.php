<?php
class Admin_NewsController extends ZendStock_Controller_Action {
	public $config;
    
	public function init() {     
	     $dirTemplate = '/admin/templates/default';		 
		 $dirTheme = '/admin/themes/default';		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);  
		 session_start();
	}
	
	public function newsAction() {			      
	     $this->view->headTitle($this->config['title']['news']);	
	     $_SESSION['log'] = true;	     		
	}	

	public function sectionAction() {			      
	     $this->view->headTitle($this->config['title']['section']);	
	     $_SESSION['log'] = true;	     		
	}

    public function categoryAction() {			      
	     $this->view->headTitle($this->config['title']['category']);	
	     $_SESSION['log'] = true;	     		
	}
}