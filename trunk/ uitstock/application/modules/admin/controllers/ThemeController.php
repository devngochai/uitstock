<?php
class Admin_ThemeController extends ZendStock_Controller_Action {
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
		$this->view->headTitle($this->config['title']['theme']);	
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];	
		
		$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
		$components = $componentMapper->fetchAllByOrder();
		$component_1 = $components[0]; 								
				
		$component_id = $this->request->getParam('component');	
					
		if (null == $component_id) $c = $component_1->id;
		else $c = $component_id;
					
		$name = $this->request->getParam('name');
		if (null == $name) 
			$themes = $this->themeMapper->getThemeByComponent($c);					    		
		else
			$themes = $this->themeMapper->searchTheme($name, $c);
			     	
		$this->view->c = $c;				
        $this->view->components = $components;        		
		$this->view->themes = $themes;			  		     		     		
	}  
	
	public function addAction() 
	{					
		$this->view->headTitle($this->config['title']['addTheme']);
		
		$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
		$components = $componentMapper->fetchAll();		
		$form = new Cloud_Form_Admin_Theme_Add(array('components' => $components));				
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {			
				$values = $form->getValues();
				$theme = new Cloud_Model_Theme_CloudTheme($values);
				$component_id = $values['component_id'];																	
				$this->themeMapper->saveTheme($theme, $component_id);
				$this->view->message = 'Đã thêm theme: ' . $theme->getName();
			}
		}
		
		$this->view->form = $form;						
	}
	
	public function editAction() {		
		$this->view->headTitle($this->config['title']['editTheme']); 
		    		
		if ($this->request->getParam('id') != null) {
			$id = $this->request->getParam('id');	
			
			$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
			$components = $componentMapper->fetchAll();	
			$currentTheme = new Cloud_Model_Theme_CloudTheme();		 		
			$this->themeMapper->find($id, $currentTheme);					
			
			$form = new Cloud_Form_Admin_Theme_Edit(array(
			               'theme' => $currentTheme,
			               'components' => $components,		               
			));									
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$theme = new Cloud_Model_Theme_CloudTheme($form->getValues());																				
					$this->themeMapper->save($theme);
					$this->view->message = 'Đã sửa theme: ' . $currentTheme->getName();
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
		$theme = new Cloud_Model_Theme_CloudTheme();		 		
		$this->themeMapper->find($id, $theme);		
		if (null == $theme) echo 'error';
		else if ($theme->getIs_default() == '1') echo 'default';
		else {
			$db = $this->themeMapper->getDbTable();
			$where = $db->getAdapter()->quoteInto('id = ?', $id);
			$db->delete($where);
		}
	}
	
	public function setDefaultThemeAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);				
					
		$componentMapper = new Cloud_Model_Component_CloudComponentMapper();	
		$component_1 = $componentMapper->getFirstComponent();	
		
		$component_id = $this->request->getParam('component');		
		$id = $this->request->getParam('id');		
		$count = $this->request->getParam('count');			
			
		$theme = new Cloud_Model_Theme_CloudTheme();		 		
		$this->themeMapper->find($id, $theme);			
					
		if (null == $theme) echo 'error';
		else {
			if (null == $component_id)
				$this->themeMapper->setDefaulTheme($id, $component_1->id, $count);
			else 
				$this->themeMapper->setDefaultTheme($id, $component_id, $count);	
		}
	}	
	
	public function autoSuggestionThemeAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);	
				
		$name = $this->request->getParam('name');		
		$component_id = $this->request->getParam('component_id');
		$result = $this->themeMapper->autoSuggestionTheme($name, $component_id);					
		if ($result) {			
			echo '<ul>';
			foreach ($result as $row) {
				echo '<li onClick="fill(\''.$row->name.'\');">'.$row->name.'</li>';	
			}
			echo '</ul>';
		} 
	}				
}