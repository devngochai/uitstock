<?php
class Admin_ModuleController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $moduleMapper;
	public $privilegeTypeMapper;
	public $privilegeMapper;
    
	public function init() {    		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->moduleMapper = new Cloud_Model_Module_CloudModuleMapper();
		 $this->privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
		 $this->privilegeTypeMapper = new Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper(); 			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    
		 session_start();
		 $_SESSION['log'] = true;			 
		 $this->request = $this->getRequest();		 		 		 	
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
	    	));
		}		
	}
	
	public function addModuleAction() {
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
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if (null != $this->request->getParam('listid')) {			
			$id = $this->request->getParam('listid');				
			$this->moduleMapper->delete($id);
		}
	}
	
	public function addPrivilegeAction() {
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
	    	));
		}		
	}
	
	public function editPrivilegeAction() {
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
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if (null != $this->request->getParam('listid')) {			
			$id = $this->request->getParam('listid');				
			$this->privilegeMapper->delete($id);
		}
	}
}