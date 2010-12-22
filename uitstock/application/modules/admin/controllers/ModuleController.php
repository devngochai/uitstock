<?php
class Admin_ModuleController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $moduleMapper;
	public $privilegeTypeMapper;
	public $privilegeMapper;
	public $privileges;	
	public $entry;
    
	public function init() { 	
		 if (!isset($_SESSION['log']))
		 	$this->_redirect('admin/index/error');
		 				 
		 $this->privileges = $_SESSION['privilege'];		 
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 45) $flag = true; 
		 }
		 
	 	 if (!$flag)
			$this->_redirect('admin/index/error');		  
		   		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->moduleMapper = new Cloud_Model_Module_CloudModuleMapper();
		 $this->privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
		 $this->privilegeTypeMapper = new Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper(); 			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    							
		 $this->request = $this->getRequest();	

		 $this->view->privileges = $this->privileges;	
		 
		 $this->entry = "";
		 foreach ($this->privileges as $privilege) {
			$this->entry = $this->entry . "," . $privilege['id']; 
		 }
		 $this->entry = substr($this->entry, 1);
		 
		 $this->view->assign(array(	    	
		 	'userMapper' => new Cloud_Model_User_CloudUserMapper(),
		 	'session' => new Cloud_Model_UserSession_CloudUserSessionMapper(),	    	   		    
	    ));			 
	}				
	
	public function listAction() {
		$this->view->headTitle($this->config['title']['module']);		
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];
		
		$page = $this->_getParam('page', 1);	
		$modules = $this->moduleMapper->fetchAll($page);
		$privilegeTypes = $this->privilegeMapper->fetchAllPrivilege();

		$this->view->assign(array(
			'modules' => $modules,	
		    'privilegeTypes' => $privilegeTypes,
		    'button1' => $this->privilegeTypeMapper->getButton1ById($this->entry, 13),
		));										  		     		     		
	}  
	
	public function viewModuleAction()
	{
		$this->view->headTitle($this->config['title']['viewModule']);
		
		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			
			$currentModule = new Cloud_Model_Module_CloudModule();
			$this->moduleMapper->find($id, $currentModule);
			
			$privilegeTypes = $this->privilegeTypeMapper->getPrivilegeTypeByModule($currentModule->id);					
														
			$this->view->assign(array(			
	    		'module' => $currentModule,	 
			    'privilegeTypes' => $privilegeTypes,  
			    'button2' => $this->privilegeTypeMapper->getButton2ById($this->entry, 13),
	    	));
		}		
	}
	
	public function addModuleAction() {
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 47) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['addModule']);		  
	    
	    $form = new Cloud_Form_Admin_Module_Add();

		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {			
				$values = $form->getValues();
				$module = new Cloud_Model_Module_CloudModule($values);
				$this->moduleMapper->save($module);																			
				$this->view->message = 'Đã thêm module: ' . $values['name'];
			}
		}
		
		$this->view->form = $form;				
	}	
	
	public function editModuleAction() {
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 49) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['editModule']);

		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			$currentModule = new Cloud_Model_Module_CloudModule();
			$this->moduleMapper->find($id, $currentModule);
		
			$form = new Cloud_Form_Admin_Module_Edit(array(
			  	'module' => $currentModule,		
			    'privilegeType' => $this->privilegeTypeMapper->getPrivilegeTypeByModule($currentModule->id),
				'privilegeTypes' => $this->privilegeTypeMapper->fetchAll(), 			  		
			));
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$values = $form->getValues();							
					$module = new Cloud_Model_Module_CloudModule($values);
					$this->moduleMapper->save($module);
					$this->privilegeMapper->update($values['id'], $values['privileges']);																						
					$this->view->message = 'Đã sửa module: ' . $values['name'];
				}
			}
			
			$this->view->form = $form;
		}					
	}
	
	public function deleteModuleAction()
	{
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 50) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if (null != $this->request->getParam('listid')) {			
			$id = $this->request->getParam('listid');				
			$this->moduleMapper->delete($id);
		}
	}
	
	public function addPrivilegeAction() {
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 48) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['addPrivilege']);		  
	    
	    $form = new Cloud_Form_Admin_Privilege_Add(array(
			'modules' => $this->moduleMapper->getAll(),
		));

		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {			
				$values = $form->getValues();
				$privilegeType = new Cloud_Model_PrivilegeType_CloudPrivilegeType($values);
				$newId = $this->privilegeTypeMapper->save($privilegeType);
				$this->privilegeMapper->saveAll($values, $newId);																
				$this->view->message = 'Đã thêm privilege: ' . $values['name'];
			}
		}
		
		$this->view->form = $form;				
	}	
	
	public function viewPrivilegeAction()
	{		 
		$this->view->headTitle($this->config['title']['viewPrivilege']);
		
		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
								
			$privilege = $this->privilegeMapper->getPrivilegeById($id);					
														
			$this->view->assign(array(			
	    		'privilege' => $privilege,	 		
			    'button2' => $this->privilegeTypeMapper->getButton2V2ById($this->entry, 13),	      
	    	));
		}		
	}
	
	public function editPrivilegeAction() {
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 51) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['editPrivilege']);

		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			
			$privilege = $this->privilegeMapper->getPrivilegeById($id);		
		
			$form = new Cloud_Form_Admin_Privilege_Edit(array(
			  	'modules' => $this->moduleMapper->getAll(),
			    'privilege' => $this->privilegeMapper->getPrivilegeById($id),				 			  		
			));
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$values = $form->getValues();
					$privilegeType = new Cloud_Model_PrivilegeType_CloudPrivilegeType($values);
					$this->privilegeTypeMapper->save($privilegeType);					
					$this->privilegeMapper->saveAll($values, $values['id']);																
					$this->view->message = 'Đã sửa privilege: ' . $values['name'];
				}
			}
			
			$this->view->form = $form;
		}
	}
	
	public function deletePrivilegeAction()
	{
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 52) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if (null != $this->request->getParam('listid')) {			
			$id = $this->request->getParam('listid');				
			$this->privilegeMapper->delete($id);
		}
	}
}