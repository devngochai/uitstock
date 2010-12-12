<?php
class Admin_RoleController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $roleMapper;
	public $rolePrivilegeMapper;

	public function init() {    		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->roleMapper = new Cloud_Model_Role_CloudRoleMapper();
		 $this->rolePrivilegeMapper = new Cloud_Model_RolePrivilege_CloudRolePrivilegeMapper();		 	 			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    
		 session_start();
		 $_SESSION['log'] = true;			 
		 $this->request = $this->getRequest();		 		 		 	
	}				
	
	public function listAction() {
		$this->view->headTitle($this->config['title']['role']);		
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];								

		$this->view->assign(array(
			'roles' => $this->roleMapper->fetchAll(),			    
		));										  		     		     		
	}  
	
	public function addAction() {
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
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if (null != $this->request->getParam('listid')) {			
			$id = $this->request->getParam('listid');					
			$this->roleMapper->delete($id);
			$this->rolePrivilegeMapper->delete($id);
		}
	}
}