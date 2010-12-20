<?php
class IndexController extends ZendStock_Controller_Action {
	public $config;
	public $widgetMapper;		
    
	public function init() { 		
		 if (isset($_COOKIE['Username']) && isset($_COOKIE['Password']) && !isset($_SESSION['player_log'])) 
		 	$this->_redirect('auth/login/');
		 	   
		 $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		  			     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(2); 
		 $dirTheme = $themeMapper->getThemeDefault(2);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    

	     $this->widgetMapper = new Cloud_Model_Widget_CloudWidgetMapper();	     	     	 
	     	     		 	 
		 if (!isset($_SESSION['player_log'])) $_SESSION['back'] = $_SERVER['REQUEST_URI'];        
		 $this->request = $this->getRequest();		 
		 
		 $this->view->assign(array(
	    	'menuItemMapper' => new Cloud_Model_MenuItem_CloudMenuItemMapper(),	    	    	
	        'newsMapper' => new Cloud_Model_Article_CloudArticleMapper(), 
		 	'playerMapper' => new Cloud_Model_Player_CloudPlayerMapper(),
		 	'session' => new Cloud_Model_PlayerSession_CloudPlayerSessionMapper(),	    	   		    
	    ));		 
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