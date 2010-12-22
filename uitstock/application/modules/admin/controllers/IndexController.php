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
	     unset($_SESSION['temp']);
	     
		 $this->view->assign(array(	    	
		 	'userMapper' => new Cloud_Model_User_CloudUserMapper(),
		 	'session' => new Cloud_Model_UserSession_CloudUserSessionMapper(),	    	   		    
	    ));		     
	}
	
	public function loginAction() {			      
	    if ($_SESSION['log']) {
	   	 	$this->_redirect('admin/index/home');
	   	} else {
	   		
	   		$this->view->headTitle($this->config['title']['login']);	

		    if (isset($_POST['btnSubmit'])) {	     	
		     	$email = $_POST['email'];
		     	$password = $_POST['password'];	
		     	$remember = $_POST['remember'];		     		     	
		     	
		     	$salt = md5($email);
		     	$password_md5 = md5($password);
		     	$password = md5($password_md5 . $salt);	     			
		     	
		     	$userMapper = new Cloud_Model_User_CloudUserMapper();
				if ($userMapper->isValidate($email, $password)) {					
					$currentUser = $userMapper->findUserByEmail($email);					
					$_SESSION['userId'] = $currentUser['id'];
					$_SESSION['role_name'] = $currentUser['role_name'];
					$_SESSION['full_name'] = $currentUser['full_name'];
					$_SESSION['avatar'] = $currentUser['avatar'];									
					$_SESSION['privilege']= $userMapper->getRolePrivilegeById($currentUser['id']);					
					$_SESSION['log'] = true;
					$this->_redirect('admin/index/home');
				} else {			
					$this->view->message = 'Thông tin đăng nhập không đúng';				
				}                   
		     }
	   	}
	}  

	public function logOutAction()
	{
		 if (!isset($_SESSION['log']))
		 	$this->_redirect('admin/index/error');
		 			
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		$sessionMapper = new Cloud_Model_UserSession_CloudUserSessionMapper();
		$sessionMapper->deleteSession($_SESSION['userId']);
		
		Zend_Session::destroy(true);     
		$this->_redirect('admin/index/login');
	}

	public function homeAction() {
		if (!$_SESSION['log']) {
			$this->_redirect('admin/index/error');
		} else {
			$this->view->headTitle($this->config['title']['index']);
			$privileges = $_SESSION['privilege'];
		
			$entry = "";
			foreach ($privileges as $privilege) {
				$entry = $entry . "," . $privilege['id']; 
			}	
			$entry = substr($entry, 1);
			$privilegeTypeMapper = new Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper();			
			$this->view->shortcuts = $privilegeTypeMapper->getShortcutById($entry);
		}											
	}
	
	public function errorAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		echo "<p>You don't have permission to access this page!</p>";
	}
}