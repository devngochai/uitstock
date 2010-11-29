<?php
class Admin_UserController extends ZendStock_Controller_Action {
	public $config;
    
	public function init() {      			     	           
	     $dirTemplate = '/admin/templates/default';		 
		 $dirTheme = '/admin/themes/default';		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);  
		 session_start();
	}
	
	public function userAction() {			      
	     $this->view->headTitle($this->config['title']['user']);	
	     $_SESSION['log'] = true;	     		
	}

    public function groupAction() {			      
	     $this->view->headTitle($this->config['title']['group']);	
	     $_SESSION['log'] = true;	     		
	}
	
     public function roleAction() {			      
	     $this->view->headTitle($this->config['title']['role']);	
	     $_SESSION['log'] = true;	     		
	}
}