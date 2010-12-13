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
	     session_start();
	     unset($_SESSION['temp']);
	}
	
	public function indexAction() {			      
	     $this->view->headTitle($this->config['title']['login']);	

	     if (isset($_POST['btnSubmit'])) {	     	
	     	$email = $_POST['email'];
	     	$password = $_POST['password'];
	     	echo $password;
	     	
	     	$salt = md5($email);
	     	$password_md5 = md5($password);
	     	$password = md5($password_md5 . $salt);	     			
	     	
	        $dbAdapter = Zend_Db_Table::getDefaultAdapter();	        
        	$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

     	    $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

	        $authAdapter->setTableName('users')
                        ->setIdentityColumn('email')
                        ->setCredentialColumn('password')
                        ->setIdentity($email)
                        ->setCredential($password);
	                    	    

	        $auth = Zend_Auth::getInstance();
	        $result = $auth->authenticate($authAdapter);
	
//		       if ($result->isValid()) {
//		            $user = $authAdapter->getResultRowObject();
//		            $auth->getStorage()->write($user);
//		            return true;
//		        }	                    
	     }
	}   	

	public function homeAction() {
		$this->view->headTitle($this->config['title']['index']);		
		$_SESSION['log'] = true;					
	}
}