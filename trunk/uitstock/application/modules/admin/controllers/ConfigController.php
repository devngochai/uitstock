<?php
class Admin_ConfigController extends ZendStock_Controller_Action {
	public $config;		
	public $privileges;
    
	public function init() {    	
		 if (!isset($_SESSION['log']))
		 	$this->_redirect('admin/index/error');
		 				 
		 $this->privileges = $_SESSION['privilege'];
		 $this->request = $this->getRequest();		 
		 
		 $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		
		 $componentMapper = new Cloud_Model_Component_CloudComponentMapper();	     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(1); 
		 $dirTheme = $themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);

		 $this->view->assign(array(	    	
		 	'userMapper' => new Cloud_Model_User_CloudUserMapper(),
		 	'session' => new Cloud_Model_UserSession_CloudUserSessionMapper(),	    	   		    
	    ));		     
	}			
	
	public function visitStaticsAction() {		 		 
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 1) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['visit']);
		$imgDir = $this->config['dirImg'];
		
		$playerMapper = new Cloud_Model_Player_CloudPlayerMapper();
		$playerSessionMapper = new Cloud_Model_PlayerSession_CloudPlayerSessionMapper();		
		$playerNumber = 3;				
		$playerLink = 'admin/config/paging-ajax/';
		$playerUpdate = 'admin/config/update-player-total-pages';
		
		$userMapper = new Cloud_Model_User_CloudUserMapper();
		$userSessionMapper = new Cloud_Model_UserSession_CloudUserSessionMapper();		
		$userNumber = 3;				
		$userLink = 'admin/config/paging-ajax-user/';
		$userUpdate = 'admin/config/update-player-total-pages-user';		
				
		 $this->view->assign(array(	    		    	    		         
			'players' => $playerMapper->fetchUserOnline(0 ,$playerNumber),		
		 	'playerMapper' => $playerMapper,
		 	'playerPaging' => $playerMapper->showPaging($playerNumber, $playerUpdate, $playerLink, $imgDir),			 			 			 		    	   		    
			'users' => $userMapper->fetchUserOnline(0 ,$userNumber),		
		 	'userMapper' => $userMapper,
		 	'userPaging' => $userMapper->showPaging($userNumber, $userUpdate, $userLink, $imgDir),		 
	    ));			
	}
	
	public function pagingAjaxAction()
	{
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 1) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 }
		 
		 $this->_helper->layout()->disableLayout();

		 if (null != $this->request->getParam('page')) {
		 	$page = $this->request->getParam('page');
		 	$number = $this->request->getParam('number');
		 	$start = ($page - 1) * $number;
		 	
		 	$playerMapper = new Cloud_Model_Player_CloudPlayerMapper();
		 	
		 	$this->view->assign(array(	    		    	    		         
				'players' => $playerMapper->fetchUserOnline($start ,$number),					 			 					 			 			 		    	   		    
	    	));			 	
		 }
		 
	}
	
	public function updatePlayerTotalPagesAction()
	{
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 1) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 }
		 
		 $this->_helper->layout()->disableLayout();
		 $this->_helper->viewRenderer->setNoRender(true);	

		 if (null != $this->request->getParam('number')) {
		 	$number = $this->request->getParam('number');
		 	$playerMapper = new Cloud_Model_Player_CloudPlayerMapper();
		 	echo $playerMapper->updateTotalPages($number);	 	
		 }		
	}
	
	public function pagingAjaxUserAction()
	{
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 1) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 }
		 
		 $this->_helper->layout()->disableLayout();

		 if (null != $this->request->getParam('page')) {
		 	$page = $this->request->getParam('page');
		 	$number = $this->request->getParam('number');
		 	$start = ($page - 1) * $number;
		 	
		 	$userMapper = new Cloud_Model_User_CloudUserMapper();
		 	
		 	$this->view->assign(array(	    		    	    		         
				'users' => $userMapper->fetchUserOnline($start ,$number),					 			 					 			 			 		    	   		    
	    	));			 	
		 }
		 
	}
	
	public function updatePlayerTotalPagesUserAction()
	{
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 1) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 }
		 
		 $this->_helper->layout()->disableLayout();
		 $this->_helper->viewRenderer->setNoRender(true);	

		 if (null != $this->request->getParam('number')) {
		 	$number = $this->request->getParam('number');
		 	$userMapper = new Cloud_Model_User_CloudUserMapper();
		 	echo $userMapper->updateTotalPages($number);	 	
		 }		
	}	
	
	public function fileManagerAction()
	{
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 3) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['fileManager']);	
	}
	
	public function configurationAction() {
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 5) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		
		$this->view->headTitle($this->config['title']['configuration']);		
	}
}