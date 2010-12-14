<?php
class Admin_UserController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $userMapper;
	public $roleMapper;
    
	public function init() { 
		 session_start();
	 	 if (!$_SESSION['log']) {
			$this->_redirect('admin/index/login');
		 }
		    		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->userMapper = new Cloud_Model_User_CloudUserMapper();
		 $this->roleMapper = new Cloud_Model_Role_CloudRoleMapper();
		  			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    		 		 			
		 $this->request = $this->getRequest();		 		 		 	
	}				
	
	public function listAction() {
		$this->view->headTitle($this->config['title']['user']);		
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];
		
		$page = $this->_getParam('page', 1);	
		$users = $this->userMapper->fetchAll($page);	

		$this->view->assign(array(
			'users' => $users,			   
		));										  		     		     		
	}
	
	public function viewAction()
	{
		$this->view->headTitle($this->config['title']['viewUser']);
		
		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			
			$currentUser = $this->userMapper->getUserById($id);					
														
			$this->view->assign(array(			
	    		'user' => $currentUser,	 			  
	    	));
		}		
	}

	public function addAction() {
		$this->view->headTitle($this->config['title']['addUser']);		  
	    
	    $form = new Cloud_Form_Admin_User_Add(array(
	    	'roles' => $this->roleMapper->fetchAll(),
	    ));

		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {			
				$values = $form->getValues();
				$user = new Cloud_Model_User_CloudUser($values);
				$this->userMapper->save($user);												
				$this->view->message = 'Đã thêm thành viên : ' . $values['full_name'];
			}
		}
		
		$this->view->form = $form;				
	}

	public function editAction() {
		$this->view->headTitle($this->config['title']['editUser']);

		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
					
			$form = new Cloud_Form_Admin_User_Edit(array(
			  	'user' => $this->userMapper->getUserById($id),	
			    'roles' => $this->roleMapper->fetchAll(),				    			 			  		
			));
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$values = $form->getValues();
					$user = new Cloud_Model_User_CloudUser($values);
					$this->userMapper->save($user);				
					if ($id == $_SESSION['userId']) $_SESSION['full_name'] = $values['full_name'];								
					$this->view->message = 'Đã thay đổi thông tin thành viên : ' . $values['full_name'];
				}
			}
			
			$this->view->form = $form;
		}					
	}
	
	public function changeAvatarAction()
	{
		$this->view->headTitle($this->config['title']['changeAvatar']);
		
		if (null != $this->request->getParam('id')) {		
			$id = $this->request->getParam('id');							
			$this->view->user = $this->userMapper->getUserById($id);

			if (isset($_POST['btnSubmit'])) {
				$id = $_POST['id'];
				$avatar = $_POST['avatar'];
				$email = $_POST['email'];
				$path = $this->userMapper->updateAvatar($id, $email, $avatar);
				if ($id == $_SESSION['userId']) $_SESSION['avatar'] = $path;
				header("Location: #");	
			}
		}
	}
	
	public function changePasswordAction()
	{
		$this->view->headTitle($this->config['title']['changePassword']);
		
		if (null != $this->request->getParam('id')) {		
			$id = $this->request->getParam('id');
			$user = $this->userMapper->getUserById($id);		

			$form = new Cloud_Form_Admin_User_ChangePassword(array(
			  	'user' => $user,				  		    			 			  		
			));		

			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$values = $form->getValues();
					$id = $values['id'];
					$email = $values['email'];
					$password = $values['new_password'];					
					$this->userMapper->updatePassword($id, $email, $password);												
					$this->view->message = 'Đã thay đổi mật khẩu thành viên : ' . $user['full_name'];
				}
			}
			
			$this->view->assign(array(			
	    		'user' => $user,		
			    'form' => $form,  
	    	));						
		}
	}
	
	public function enableAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
				 
		if ($this->request->getParam('listid') != null) {			
			$listid = explode(",", $this->request->getParam('listid'));
			$mapper = $this->request->getParam('mapper');
			$dbTable = $this->$mapper->getDbTable();			
			Cloud_Model_Utli_CloudUtli::setPublish($dbTable, $listid);	
		}	
		else 
			echo 'error';							
	}
	
	public function disableAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->request->getParam('listid') != null) {				 			
			$listid = explode(",", $this->request->getParam('listid'));					 			
			$mapper = $this->request->getParam('mapper');
			$dbTable = $this->$mapper->getDbTable();
			Cloud_Model_Utli_CloudUtli::setUnPublish($dbTable, $listid);	
		}		
		else 
			echo 'error';						
	}	
	
	public function setEnableAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->request->getParam('id') != null) {							
			$id = $this->request->getParam('id');		 															 			
			$mapper = $this->request->getParam('mapper');
			$dbTable = $this->$mapper->getDbTable();
			Cloud_Model_Utli_CloudUtli::setEnableAjax($dbTable, $id);	
		}		
		else 
			echo 'error';
	}
	
	public function deleteAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);		
						
		if ($this->request->getParam('listid') != null) {			
			$listid = $this->request->getParam('listid');
			$this->userMapper->deleteAll($listid);
		}								
	}
}