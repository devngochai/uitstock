<?php
class Admin_RoleController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $roleMapper;
	public $rolePrivilegeMapper;
	public $privileges;
	public $privilegeTypeMapper;
	public $entry;

	public function init() {   
		 session_start();
		 $this->privileges = $_SESSION['privilege'];		 
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 40) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		  		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->roleMapper = new Cloud_Model_Role_CloudRoleMapper();
		 $this->rolePrivilegeMapper = new Cloud_Model_RolePrivilege_CloudRolePrivilegeMapper();		 	 			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    							 
		 $this->request = $this->getRequest();	

		 $this->privilegeTypeMapper = new Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper();
		 $this->view->privileges = $this->privileges;	
		 
		 $this->entry = "";
		 foreach ($this->privileges as $privilege) {
			$this->entry = $this->entry . "," . $privilege['id']; 
		 }
		 $this->entry = substr($this->entry, 1);
	}				
	
	public function listAction() {
		$this->view->headTitle($this->config['title']['role']);		
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];								

		$this->view->assign(array(
			'roles' => $this->roleMapper->fetchAll(),	
		    'button1' => $this->privilegeTypeMapper->getButton1ById($this->entry, 12),		    
		));										  		     		     		
	}  
	
	public function addAction() {
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 42) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['addRole']);		

		if (isset($_POST['ok'])) {
			$selects = $_POST['select'];
			$roleId = $_POST['roleId'];			
			$roleName = $_POST['roleName'];		
			$this->rolePrivilegeMapper->saveAll($selects, $roleId);
			$this->view->message = 'Đã thêm role: ' . $roleName;
		}
	}
	
	public function addContAction() {
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 42) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->_helper->layout()->disableLayout();
									
		if (null != $this->request->getParam('name')) {
			
			$name =  $this->request->getParam('name');
			$role = $this->roleMapper->checkUniqueName($name);
			
			if (null != $role) {
				echo 'duplicate';
				exit();
			}
			
			$data = array(
				'name' => $name,
				'description' => $this->request->getParam('description'),
			);

			$newId = $this->roleMapper->saveAll($data);

			$moduleMapper = new Cloud_Model_Module_CloudModuleMapper();
			$privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
			
			$modules = $moduleMapper->fetch();
			$privilegeTypes = $privilegeMapper->fetchAllPrivilege();
	
			$this->view->assign(array(
				'modules' => $modules,	
			    'privilegeTypes' => $privilegeTypes,
			    'roleId' => $newId,
			    'name' => $name,
			));	
			
		}
	}
	
	public function editAction() {
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 43) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['addRole']);		
		
		$id = $this->request->getParam('id');
		$role = new Cloud_Model_Role_CloudRole();
		$this->roleMapper->find($id, $role);		
		$this->view->role = $role;

		if (isset($_POST['ok'])) {
			$selects = $_POST['select'];
			$roleId = $_POST['roleId'];			
			$roleName = $_POST['roleName'];		
			$this->rolePrivilegeMapper->saveAll($selects, $roleId);
			$this->view->message = 'Đã thêm role: ' . $roleName;
		}
	}
	
	public function editContAction() {
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 43) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->_helper->layout()->disableLayout();
									
		if (null != $this->request->getParam('name')) {
			
			$name =  $this->request->getParam('name');
			$id = $this->request->getParam('id');
			$role = $this->roleMapper->checkUniqueName($name, $id);
			
			if (null != $role) {
				echo 'duplicate';
				exit();
			}
			
			$data = array(
				'name' => $name,
				'description' => $this->request->getParam('description'),
			    'id' => $id,
			);

			$this->roleMapper->saveAll($data);

			$moduleMapper = new Cloud_Model_Module_CloudModuleMapper();
			$privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
			
			$modules = $moduleMapper->fetch();
			$privilegeTypes = $privilegeMapper->fetchAllPrivilege();
			$rolePrivilege = $this->rolePrivilegeMapper->getRolePrivilegeByRole($id);
	
			$this->view->assign(array(
				'modules' => $modules,	
			    'privilegeTypes' => $privilegeTypes,
			    'roleId' => $id,
			    'name' => $name,
				'rolePrivilege' => $rolePrivilege,
			));	
			
		}
	}
	
	public function deleteAction()
	{
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 44) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if (null != $this->request->getParam('listid')) {			
			$id = $this->request->getParam('listid');					
			$this->roleMapper->delete($id);
			$this->rolePrivilegeMapper->delete($id);
		}
	}
}