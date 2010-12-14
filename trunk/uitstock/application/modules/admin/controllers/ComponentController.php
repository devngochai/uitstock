<?php
class Admin_ComponentController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $componentMapper;
    
	public function init() {    
		 session_start();
	 	 if (!$_SESSION['log']) {
			$this->_redirect('admin/index/login');
		 }
		 
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		
		 $this->componentMapper = new Cloud_Model_Component_CloudComponentMapper();	     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    	        	    		 
		 		
		 $this->request = $this->getRequest();		 	 
	}				
	
	public function listAction() {
		$this->view->headTitle($this->config['title']['component']);	
				
		$components = $this->componentMapper->getAllComponent();		
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];									     	
        $this->view->components = $components;        					  		     		     		
	}  	

	public function addAction() 
	{
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
	
	public function deleteAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);		
				
		$id = $this->request->getParam('id');		
		$component = new Cloud_Model_Component_CloudComponent();		 		
		$this->componentMapper->find($id, $component);		
		if (null == $component) echo 'error';		
		else {
			$db = $this->componentMapper->getDbTable();
			$where = $db->getAdapter()->quoteInto('id = ?', $id);
			$db->delete($where);
		}
	}
					
}