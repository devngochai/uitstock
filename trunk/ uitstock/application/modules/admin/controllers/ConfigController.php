<?php
class Admin_ConfigController extends ZendStock_Controller_Action {
	public $config;
    
	public function init() {      			     	           
	     $dirTemplate = '/admin/templates/default';		 
		 $dirTheme = '/admin/themes/default';		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);  
		 session_start();
		 $_SESSION['log'] = true;
	}			
	
	public function visitstaticsAction() {
		$this->view->headTitle($this->config['title']['visit']);		
	}
	
	public function configurationAction() {
		$this->view->headTitle($this->config['title']['configuration']);		
	}
}