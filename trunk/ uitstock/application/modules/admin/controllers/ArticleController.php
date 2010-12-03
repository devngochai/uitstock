<?php
class Admin_ArticleController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $articleMapper;
	public $contentCategoryMapper;
    
	public function init() {    		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		
		 $this->contentCategoryMapper = new Cloud_Model_ContentCategory_CloudContentCategoryMapper();			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    
		 session_start();
		 $_SESSION['log'] = true;			 
		 $this->request = $this->getRequest();		 		 		 	
	}	
	
	public function listCategoryAction() {
		$this->view->headTitle($this->config['title']['menuCategory']);	
	    $_SESSION['log'] = true;	    	
	    
	    $this->view->assign(array(
	    		'parents' => $this->contentCategoryMapper->fetchAllParent(),
	    		'subs' => $this->contentCategoryMapper->fetchAllSub(),
	    ));
	}
}