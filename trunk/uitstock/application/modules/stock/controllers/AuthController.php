<?php
class AuthController extends ZendStock_Controller_Action {
	public $config;
	public $widgetMapper;	
	public $playerMapper;	
	public $sessionMapper;	
    
	public function init() {    
		 $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		  			     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(2); 
		 $dirTheme = $themeMapper->getThemeDefault(2);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    

	     $this->widgetMapper = new Cloud_Model_Widget_CloudWidgetMapper();	     	  
	     $this->playerMapper = new Cloud_Model_Player_CloudPlayerMapper();   
	     $this->sessionMapper = new Cloud_Model_PlayerSession_CloudPlayerSessionMapper();	 
	     	     			
		 $this->request = $this->getRequest();

		 $this->view->assign(array(
	    	'menuItemMapper' => new Cloud_Model_MenuItem_CloudMenuItemMapper(),	    	    		         
		 	'playerMapper' => new Cloud_Model_Player_CloudPlayerMapper(),
		 	'session' => $this->sessionMapper,	    	   		    
	    ));			 
	}		
	
	public function loginAction() {
		if ($_SESSION['player_log']) {
			$this->_redirect('');
		} else {					 	     		     		
		     if (isset($_COOKIE['Username']) && isset($_COOKIE['Password'])) {
		     	$this->_helper->layout()->disableLayout();
				$this->_helper->viewRenderer->setNoRender(true);
	            $username = trim(strip_tags($_COOKIE['Username']));
	            $password = trim(strip_tags($_COOKIE['Password']));	     	
		     } else {
			     $this->view->headTitle($this->config['title']['login']);		 
			 	 $_SESSION['nav-main'] = 'Trang chủ';		     	 
			     $widgets = $this->widgetMapper->getWidgetByComponentPage(2, 'login');	     	     	     
			     $form = new Cloud_Form_Stock_Login();
		     
				 $this->view->assign(array(			
		    		'widgets' => $widgets,
		    		'form' => $form,		
		     	));
			     		     	
			    if ($this->getRequest()->isPost()) {	     		
						if ($form->isValid($this->request->getPost())) {
							$values = $form->getValues();	 
							$username = $values['username'];
							$password = $values['password'];
							$password = md5($password . $username);
							$remember = $values['remember'];	
						}
			     	}			
		     }
			
		    if (isset($username) && isset($password)) {
				if ($this->playerMapper->isValidate($username, $password)) {										
					$this->playerMapper->login($username, $password, $remember);
					if (isset($_SESSION['back']))
						$this->_redirect($_SESSION['back']);
					else
						$this->_redirect('');
		 		} else {	
		 			if (!isset($form)) $this->_redirect('');		
		 			$this->view->message = 'Thông tin đăng nhập không đúng';				
		 		}   	    		
		    } 
		    	     	         							    			
		}				 		     	     		     				     		     				     			    		     		                					     	      	
	}
	
	public function logOutAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
        if(!isset($_SESSION['player_log'])) $this->_redirect('auth/login/');

        $this->sessionMapper->deleteSession($_SESSION['playerId']);
        
        Zend_Session::destroy(true);
        setcookie("Username", "", time()-60*60*24*30, '/');
        setcookie("Password", "", time()-60*60*24*30, '/');  
               
		$this->_redirect('');		
	}
	
	public function registerAction()
	{
		if ($_SESSION['player_log']) {
			$this->_redirect('');
		} else {					
			$this->view->headTitle($this->config['title']['register']);		
			$_SESSION['nav-main'] = 'Trang chủ';		
			 
		    $widgets = $this->widgetMapper->getWidgetByComponentPage(2, 'register');
		    $form = new Cloud_Form_Stock_Register();
		    
		    if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {
					$player = new Cloud_Model_Player_CloudPlayer($form->getValues());
					$this->playerMapper->save($player);
					$_SESSION['username_reg'] = $player->username;
					$this->_redirect('auth/success');
				}
			}
	
		    $this->view->assign(array(			
		    	'widgets' => $widgets,	
		    	'form' => $form,    		
		     )); 
		}
	}
	
	public function successAction()
	{
		if ($_SESSION['player_log']) {
			$this->_redirect('');
		} else {			
			$this->view->headTitle($this->config['title']['RegisterSuccess']);
			if (!$_SESSION['username_reg']) $this->_redirect('');
			$username = $_SESSION['username_reg'];
			unset($_SESSION['username_reg']);
			$widgets = $this->widgetMapper->getWidgetByComponentPage(2, 'register');
			
			$this->view->assign(array(	
				'widgets' => $widgets,			
		    	'username' => $username,		    	    		
		     )); 		
		} 
	}
	
	public function checkUsernameAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		$username = $this->request->getParam('value');			
		if (!$this->playerMapper->checkUsername($username))
			echo 'error';
		else
			echo 'ok';
	}
	
	public function checkEmailAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		$email = $this->request->getParam('value');	

		$validator = new Zend_Validate_EmailAddress();		
		if (!$validator->isValid($email)){
			echo 'error'; exit();	
		}	
		
		if (!$this->playerMapper->checkEmail($email))
			echo 'duplicate';
		else
			echo 'ok';
	}

}