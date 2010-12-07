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
	    
	    $this->view->assign(array(
	    	'widgets' => $this->widgetMapper->getWidgetByComponentPage(3, 'category'),	    
	    	'aliasP' => $this->request->getParam('aliasP'),
	        'aliasS' => $this->request->getParam('aliasS'),	  
	    	'page' => $this->_getParam('page', 1),   
	    ));
    }    
    
    public function detailAction() {
        $this->view->headTitle($this->config['title']['news']);        
	    
	    $this->view->assign(array(
	    	'widgets' => $this->widgetMapper->getWidgetByComponentPage(3, 'detail'),
	    	'alias' => $this->request->getParam('alias'),
	    	'aliasP' => $this->request->getParam('aliasP'),
	        'aliasS' => $this->request->getParam('aliasS'),
	        'id' => $this->request->getParam('id'),
	    ));
    }
    
    public function searchAction() {    
    	 $this->view->headTitle($this->config['title']['search']);        
	    
		if (null != $this->request->getParam('key')) {			
			$key = $this->request->getParam('key');
			$number = 7;
			$page = $this->_getParam('page', 1);   
			$start = ($page - 1) * $number;
			$news = $this->newsMapper->search($key,$start, $number);
			$this->view->news = $news;
			$this->view->key = $key;
			$this->view->page = $page;	
			$this->view->number = $number;			
		}
		
		$widgets = $this->widgetMapper->getWidgetByComponentPage(3, 'search');	     	  
	     
	    $this->view->widgets = $widgets;
	    ;
    }
}