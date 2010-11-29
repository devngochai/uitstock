<?php
class Admin_PageController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $pageMapper;
    
	public function init() {    		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->pageMapper = new Cloud_Model_Page_CloudPageMapper(); 			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    
		 session_start();
		 $_SESSION['log'] = true;			 
		 $this->request = $this->getRequest();		 		 		 	
	}				
	
	public function listAction() {
		$this->view->headTitle($this->config['title']['page']);		
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];
		
		$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
		$components = $componentMapper->fetchAllByFront();
		$component_1 = $components[0];										
		
		$component_id = $this->request->getParam('component');	
		
		if (null == $component_id) $c = $component_1->id;
		else $c = $component_id;

		$title = $this->request->getParam('title');
		if (null == $title) 
			$pages = $this->pageMapper->getPageByComponent($c);					    		
		else
			$pages = $this->pageMapper->searchPage($title, $c);
											     	
		$this->view->c = $c;		
        $this->view->components = $components;     
        $this->view->pages = $pages;   							  		     		     		
	}  
	
	public function addAction() 
	{					
		$this->view->headTitle($this->config['title']['addPage']);
		
		$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
		$components = $componentMapper->fetchAllByFront();		
		$componentMaxOrder = $this->pageMapper->getMaxOrder();				
		$form = new Cloud_Form_Admin_Page_Add(array(
							'components' => $components,
							'page' => $componentMaxOrder));				
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {			
				$values = $form->getValues();
				$page = new Cloud_Model_Page_CloudPage($values);
				$component_id = $values['component_id'];																	
				$this->pageMapper->savePage($page, $component_id);
				$this->view->message = 'Đã thêm page: ' . $page->getName();
			}
		}
		
		$this->view->form = $form;						
	}
	
	public function editAction() {		
		$this->view->headTitle($this->config['title']['editPage']); 
		    		
		if ($this->request->getParam('id') != null) {
			$id = $this->request->getParam('id');
			
			$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
			$components = $componentMapper->fetchAll();	
			$currentPage = new Cloud_Model_Page_CloudPage();		 		
			$this->pageMapper->find($id, $currentPage);					
			
			$form = new Cloud_Form_Admin_Page_Edit(array(
			               'page' => $currentPage,
			               'components' => $components,		               
			));									
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$page = new Cloud_Model_Page_CloudPage($form->getValues());																								
					$this->pageMapper->save($page);
					$this->pageMapper->setHome($page);		
					$this->view->message = 'Đã sửa page: ' . $currentPage->getName();
				}
			}
			
			$this->view->form = $form;	
		}							
	}
	
	public function publishAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
				 
		if ($this->request->getParam('listid') != null) {			
			$listid = explode(",", $this->request->getParam('listid'));
			$this->pageMapper->setPublish($listid);	
		}	
		else 
			echo 'error';							
	}
	
	public function unpublishAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->request->getParam('listid') != null) {				 			
			$listid = explode(",", $this->request->getParam('listid'));					 			
			$this->pageMapper->setUnPublish($listid);	
		}		
		else 
			echo 'error';						
	}	
	
	public function setPublishAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->request->getParam('id') != null) {							
			$id = $this->request->getParam('id');		 															 			
			$this->pageMapper->setPublishAjax($id);	
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
			$this->pageMapper->deleteAll($listid);
		}								
	}		
	
	public function autoSuggestionPageAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);	
				
		$title = $this->request->getParam('name');		
		$component_id = $this->request->getParam('component_id');
		$result = $this->pageMapper->autoSuggestionPage($title, $component_id);					
		if ($result) {			
			echo '<ul>';
			foreach ($result as $row) {
				echo '<li onClick="fill(\''.$row->title.'\');">'.$row->title.'</li>';	
			}
			echo '</ul>';
		} 
	}		
	
	public function getPageByComponentAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);

		$componentId = $this->request->getParam('Id');	
		$pages = $this->pageMapper->getPageByComponent($componentId);
		
		echo '<input id="select_all" type="checkbox" />Check all<br/>';
		foreach ($pages as $page) {
			echo '<input name="select" type="checkbox" value="'.$page->id . '">' .$page->title . '<br/>';
		}
	}
	
	
	
}