<?php
class Admin_IndexController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
    
	public function init() {      			     	           
	     $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);
	     session_start();
	     unset($_SESSION['temp']);
	}
	
	public function indexAction() {			      
	     $this->view->headTitle($this->config['title']['login']);		     
	}   	

	public function homeAction() {
		$this->view->headTitle($this->config['title']['index']);		
		$_SESSION['log'] = true;					
	}
}