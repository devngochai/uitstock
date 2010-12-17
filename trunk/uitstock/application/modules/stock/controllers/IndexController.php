<?php
class IndexController extends ZendStock_Controller_Action {
	public $config;
	public $widgetMapper;		
    
	public function init() {    
		 $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		  			     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(2); 
		 $dirTheme = $themeMapper->getThemeDefault(2);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    

	     $this->widgetMapper = new Cloud_Model_Widget_CloudWidgetMapper();	     	     	 
	     	     
		 session_start();			 
		 $this->request = $this->getRequest();

		 $this->view->menuItemMapper = new Cloud_Model_MenuItem_CloudMenuItemMapper();
	}
	
	public function indexAction() {			      
	     $this->view->headTitle($this->config['title']['index']);		 
		 $_SESSION['nav-main'] = 'Trang chủ';		
		 
	     $widgets = $this->widgetMapper->getWidgetByComponentPage(2, 'index');
	     
	     $this->view->widgets = $widgets;
	}
    
    public function ruleAction() {
        $this->view->headTitle($this->config['title']['rule']);		
		$_SESSION['nav-main'] = 'Thể lệ sàn ảo';
		
		$widgets = $this->widgetMapper->getWidgetByComponentPage(2, 'rule');
	     
	    $this->view->widgets = $widgets;
    }	
    
    public function staticsAction() {
        $this->view->headTitle($this->config['title']['statics']);
		$_SESSION['nav-main'] = 'Thống kê sàn ảo';
		
		$widgets = $this->widgetMapper->getWidgetByComponentPage(2, 'statics');		
	     
	    $this->view->widgets = $widgets;
    }
}