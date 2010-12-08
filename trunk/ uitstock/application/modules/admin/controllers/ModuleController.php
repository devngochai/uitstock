<?php
class Admin_ModuleController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $moduleMapper;
    
	public function init() {    		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->moduleMapper = new Cloud_Model_Module_CloudModuleMapper(); 			     	           
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

		$this->view->assign(array(
			'modules' => $modules,	
		));										  		     		     		
	}  
	
	public function viewModuleAction()
	{
		$this->view->headTitle($this->config['title']['viewModule']);
		
		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			
			$currentModule = new Cloud_Model_Module_CloudModule();
			$this->moduleMapper->find($id, $currentModule);
														
			$this->view->assign(array(			
	    		'module' => $currentModule,	    		
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
			));
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$values = $form->getValues();
					$module = new Cloud_Model_Module_CloudModule($values);
					$this->moduleMapper->save($module);																						
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
}