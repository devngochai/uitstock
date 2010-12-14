<?php
class Admin_ConfigController extends ZendStock_Controller_Action {
	public $config;
    
	public function init() {    
		 session_start();
	 	 if (!$_SESSION['log']) {
			$this->_redirect('admin/index/login');
		 }
		   			     	           
	     $dirTemplate = '/admin/templates/default';		 
		 $dirTheme = '/admin/themes/default';		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);  				
	}			
	
	public function visitstaticsAction() {
		$this->view->headTitle($this->config['title']['visit']);		
	}
	
	public function fileManagerAction()
	{
		$this->view->headTitle($this->config['title']['fileManager']);	
	}
	
	public function configurationAction() {
		$this->view->headTitle($this->config['title']['configuration']);		
	}
}