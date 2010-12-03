<?php
class Admin_MenuController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $menuItemMapper;
	public $menuCategoryMapper;
    
	public function init() {    		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->menuItemMapper = new Cloud_Model_MenuItem_CloudMenuItemMapper();
		 $this->menuCategoryMapper = new Cloud_Model_MenuCategory_CloudMenuCategoryMapper();			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    
		 session_start();
		 $_SESSION['log'] = true;			 
		 $this->request = $this->getRequest();		 		 		 	
	}	
	
	public function listItemAction() {			      
	     $this->view->headTitle($this->config['title']['menuItem']);		      		
	}
	
	public function listCategoryAction() {
		$this->view->headTitle($this->config['title']['menuCategory']);		    
	}
}