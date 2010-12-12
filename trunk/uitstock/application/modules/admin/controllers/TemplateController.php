<?php
class Admin_TemplateController extends ZendStock_Controller_Action {
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
		 $_SESSION['log'] = true;			 
		 $this->request = $this->getRequest();		 		 		 	
	}				
	
	public function listAction() {
		$this->view->headTitle($this->config['title']['template']);		
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];		
		
		$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
		$components = $componentMapper->fetchAllByOrder();
		$component_1 = $components[0];	
												
		$component_id = $this->request->getParam('component');	
		
		$c = (null == $component_id) ? $component_1->id : $component_id;

		$name = $this->request->getParam('name');
		if (null == $name) 
			$templates = $this->templateMapper->getTemplateByComponent($c);					    		
		else
			$templates = $this->templateMapper->searchTemplate($name, $c);
			
		$this->view->assign(array(
				'c' => $c,
				'components' => $components,
				'templates' => $templates,
		));														     				  		     		     	
	}  
	
	public function addAction() 
	{					
		$this->view->headTitle($this->config['title']['addTemplate']);
		
		$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
		$components = $componentMapper->fetchAll();		
		$form = new Cloud_Form_Admin_Template_Add(array('components' => $components));				
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {			
				$values = $form->getValues();
				$template = new Cloud_Model_Template_CloudTemplate($values);
				$component_id = $values['component_id'];																	
				$this->templateMapper->saveTemplate($template, $component_id);
				$this->view->message = 'Đã thêm template: ' . $template->getName();
			}
		}
		
		$this->view->form = $form;						
	}
	
	public function editAction() {		
		$this->view->headTitle($this->config['title']['editTemplate']); 		    
		
		if ($this->request->getParam('id') != null) {
			$id = $this->request->getParam('id');
			
			$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
			$components = $componentMapper->fetchAll();	
			$currentTemplate = new Cloud_Model_Template_CloudTemplate();		 		
			$this->templateMapper->find($id, $currentTemplate);					
			
			$form = new Cloud_Form_Admin_Template_Edit(array(
			               'template' => $currentTemplate,
			               'components' => $components,		               
			));									
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$template = new Cloud_Model_Template_CloudTemplate($form->getValues());																				
					$this->templateMapper->save($template);
					$this->view->message = 'Đã sửa template: ' . $currentTemplate->getName();
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
		$template = new Cloud_Model_Template_CloudTemplate();		 		
		$this->templateMapper->find($id, $template);		
		if (null == $template) echo 'error';
		else if ($template->getIs_default() == '1') echo 'default';
		else {
			$db = $this->templateMapper->getDbTable();
			$where = $db->getAdapter()->quoteInto('id = ?', $id);
			$db->delete($where);
		}
	}
	
	public function setDefaultTemplateAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);										
			
		$component_id = $this->request->getParam('component');		
		$id = $this->request->getParam('id');			
		$count = $this->request->getParam('count');		
			
		$template = new Cloud_Model_Template_CloudTemplate();		 		
		$this->templateMapper->find($id, $template);	
							
		if (null == $template) echo 'error';
		else {
			$this->templateMapper->setDefaultTemplate($id, $component_id, $count);	
		}
	}	
	
	public function autoSuggestionTemplateAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);	
				
		$name = $this->request->getParam('name');		
		$component_id = $this->request->getParam('component_id');
		$result = $this->templateMapper->autoSuggestionTemplate($name, $component_id);					
		if ($result) {			
			echo '<ul>';
			foreach ($result as $row) {
				echo '<li onClick="fill(\''.$row->name.'\');">'.$row->name.'</li>';	
			}
			echo '</ul>';
		} 
	}	
	
}