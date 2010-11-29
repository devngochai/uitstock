<?php
class Admin_MenuController extends ZendStock_Controller_Action {
	public $config;
    
	public function init() {      			     	           
	     $dirTemplate = '/admin/templates/default';		 
		 $dirTheme = '/admin/themes/default';		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);  
		 session_start();
	}
	
	public function menucategoryAction() {			      
	     $this->view->headTitle($this->config['title']['menu']);	
	     $_SESSION['log'] = true;	     		
	}
	
	public function menuitemAction() {
		$this->view->headTitle($this->config['title']['menu']);	
	    $_SESSION['log'] = true;
	}
}