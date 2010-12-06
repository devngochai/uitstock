<?php
class News_IndexController extends ZendStock_Controller_Action {
	public $config;
	public $widgetMapper;
	public $newsMapper;	
	public $categoryMapper;	
    
	public function init() {      			     	           
	     $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		  			     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(3); 
		 $dirTheme = $themeMapper->getThemeDefault(3);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    

	     $this->widgetMapper = new Cloud_Model_Widget_CloudWidgetMapper();	     
	     		  
	     $this->categoryMapper = new Cloud_Model_ContentCategory_CloudContentCategoryMapper();
	     $this->newsMapper = new Cloud_Model_Article_CloudArticleMapper();
		 $this->request = $this->getRequest();	 
		 
		 $this->view->categoryMapper =  $this->categoryMapper;
		 $this->view->newsMapper = $this->newsMapper;
	}
	
	public function indexAction() {			      
	     $this->view->headTitle($this->config['title']['news']);
	     
	     $widgets = $this->widgetMapper->getWidgetByComponentPage(3, 'index');
	     
	     $this->view->widgets = $widgets;
	}      
    
    public function categoryAction() {
        $this->view->headTitle($this->config['title']['news']);
        
        $widgets = $this->widgetMapper->getWidgetByComponentPage(3, 'category');
	     
	    $this->view->widgets = $widgets;
    }    
    
    public function detailAction() {
        $this->view->headTitle($this->config['title']['news']);
        
        $widgets = $this->widgetMapper->getWidgetByComponentPage(3, 'detail');
        
        $catPID = $this->request->getParam('catPID');
        $catID = $this->request->getParam('catID');
        $id = $this->request->getParam('id');
	     
	    $this->view->widgets = $widgets;
	    $this->view->catPID = $catPID;
	    $this->view->catID = $catID;
	    $this->view->id = $id; 
    }
}