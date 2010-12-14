<?php
class Admin_ComponentController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $componentMapper;
	public $privileges;
	public $privilegeTypeMapper;
	public $entry;
    
	public function init() {    
		 session_start();
		 $this->privileges = $_SESSION['privilege'];		 
		 $flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 63) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		
		 $this->componentMapper = new Cloud_Model_Component_CloudComponentMapper();	     	           
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
		$this->view->headTitle($this->config['title']['component']);	
								
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];									     	             

        $this->view->assign(array(
	    		'components' => $this->componentMapper->getAllComponent(),	    		
	            'button1' => $this->privilegeTypeMapper->getButton1ById($this->entry, 16),	            
	    ));
	}  	

	public function addAction() 
	{
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 65) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['addComponent']);
		
		$componentNewOrder = $this->componentMapper->getMaxOrder();		
		
		$form = new Cloud_Form_Admin_Component_Add(array(
					   'component' => $componentNewOrder,
		            ));				
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {					
				$component = new Cloud_Model_Component_CloudComponent($form->getValues());																	
				$this->componentMapper->save($component);									
				$this->view->message = 'Đã thêm component: ' . $component->getName();				
			}
		}
		
		$this->view->form = $form;			
	}
	
	public function editAction() 
	{
		$flag = false;		
		 foreach ($this->privileges as $privilege) {
			if ($privilege['id'] == 66) $flag = true; 
		 }
	 	 if (!$flag) {
			$this->_redirect('admin/index/error');
		 } 
		 
		$this->view->headTitle($this->config['title']['editComponent']); 
		    		
		if ($this->request->getParam('id') != null) {
			$id = $this->request->getParam('id');
			
			$templates = $this->templateMapper->getTemplateByComponent($id);
			$themes = $this->themeMapper->getThemeByComponent($id);				
			$currentComponent = $this->componentMapper->findComponentDetail($id);						
	
			$form = new Cloud_Form_Admin_Component_Edit(array(
						   'component' => $currentComponent,		           
			               'templates' => $templates,
			               'themes' => $themes,		               
			));									
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$values =$form->getValues();
					$component = new Cloud_Model_Component_CloudComponent($values);																	
					$this->componentMapper->save($component);							
					$this->templateMapper->setDefaultTemplate($values['template_id'], $values['id']); 		
					$this->themeMapper->setDefaultTheme($values['theme_id'], $values['id']);
					$this->view->message = 'Đã sửa component: ' . $values['name'];
				}
			}
			
			$this->view->form = $form;	
		}			
	}
	
//	public function deleteAction()
//	{
//		$this->_helper->layout()->disableLayout();
//		$this->_helper->viewRenderer->setNoRender(true);		
//				
//		$id = $this->request->getParam('id');		
//		$component = new Cloud_Model_Component_CloudComponent();		 		
//		$this->componentMapper->find($id, $component);		
//		if (null == $component) echo 'error';		
//		else {
//			$db = $this->componentMapper->getDbTable();
//			$where = $db->getAdapter()->quoteInto('id = ?', $id);
//			$db->delete($where);
//		}
//	}
					
}