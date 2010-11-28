<?php
class News_IndexController extends ZendStock_Controller_Action {
	public $config;
	public $widgetMapper;	
    
	public function init() {      			     	           
	     $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		  			     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(3); 
		 $dirTheme = $themeMapper->getThemeDefault(3);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    

	     $this->widgetMapper = new Cloud_Model_Widget_CloudWidgetMapper();
	     		  
		 $this->request = $this->getRequest();	 
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
	     
	    $this->view->widgets = $widgets;
    }
}