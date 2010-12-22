<?php
class Admin_MenuController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $menuItemMapper;
	public $menuCategoryMapper;	
    
	public function init() { 
		 if (!isset($_SESSION['log']))
		 	$this->_redirect('admin/index/error');
		 			   			 				
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->menuItemMapper = new Cloud_Model_MenuItem_CloudMenuItemMapper();
		 $this->menuCategoryMapper = new Cloud_Model_MenuCategory_CloudMenuCategoryMapper();					     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    		 		 			 
		 $this->request = $this->getRequest();

		 $this->view->assign(array(	    	
		 	'userMapper' => new Cloud_Model_User_CloudUserMapper(),
		 	'session' => new Cloud_Model_UserSession_CloudUserSessionMapper(),	    	   		    
	    ));			 
	}	
		
	public function listCategoryAction() {
		$this->view->headTitle($this->config['title']['menuCategory']);		

		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];
		
		$this->view->categories = $this->menuCategoryMapper->fetchAll(); 
	}
	
	public function addCatAction() {
		$this->view->headTitle($this->config['title']['addCategory']);
		
		$form = new Cloud_Form_Admin_MenuCategory_Add();				
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {							
				$category = new Cloud_Model_MenuCategory_CloudMenuCategory($form->getValues());																					
				$this->menuCategoryMapper->save($category);
				$this->view->message = 'Đã thêm category: ' . $category->getName();
			}
		}
		
		$this->view->form = $form;	
	}
	
	public function editCatAction() {
		$this->view->headTitle($this->config['title']['editCategory']);
		
		if ($this->request->getParam('id') != null) {
			$id = $this->request->getParam('id');
										
			$currentCategory = new Cloud_Model_MenuCategory_CloudMenuCategory();		 		
			$this->menuCategoryMapper->find($id, $currentCategory);					
						
			$form = new Cloud_Form_Admin_MenuCategory_Edit(array(
			               'category' => $currentCategory,					               
			));									
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$category = new Cloud_Model_MenuCategory_CloudMenuCategory($form->getValues());																					
					$this->menuCategoryMapper->save($category);
					$this->view->message = 'Đã sửa category: ' . $category->getName();
				}
			}
			
			$this->view->form = $form;
		}	
	}
	
	public function deleteCatAction()
	{		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);		
				
		$id = $this->request->getParam('id');		
		$category = new Cloud_Model_MenuCategory_CloudMenuCategory();		 		
		$this->menuCategoryMapper->find($id, $category);				
		if (null == $category) echo 'error';		
		else {
			$db = $this->menuCategoryMapper->getDbTable();
			$where = $db->getAdapter()->quoteInto('id = ?', $id);
			$db->delete($where);
		}
	}
	
	public function listItemAction() {			      
	     $this->view->headTitle($this->config['title']['menuItem']);

	     $_SESSION['temp'] = $_SERVER['REQUEST_URI'];
	     
	     $id = $this->request->getParam('catId');		 
		 
		 $parents = $this->menuItemMapper->fetchAllParent2($id);
		 $subs = $this->menuItemMapper->fetchAllSub2($id);		 
		 
		 $this->view->assign(array(
	    		'parents' => $parents,
	    		'subs' => $subs,	
		 		'menuItem' => $this->menuItemMapper,    
		 		'catId' => $id, 	            
	    ));
	}

	public function addItemAction() {
		$this->view->headTitle($this->config['title']['addMenuItem']);
		
		$privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
		$catId =  $this->request->getParam('catId');		
		
		$form = new Cloud_Form_Admin_MenuItem_Add(array(
				'menuItems' => $this->menuItemMapper->getItemByCategory($catId),
				'privileges' => $privilegeMapper->getAccessPrivilege(),				
				'catId' => $catId,
		));				
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {	
				$values = $form->getValues();						
				$item = new Cloud_Model_MenuItem_CloudMenuItem($values);																					
				$newId = $this->menuItemMapper->save($item);
				$this->menuItemMapper->updateOrdering($newId, $values['parent_id'], $values['menu_cat_id']);
				$this->menuItemMapper->updateHome($newId, $values['is_home'], $catId);				
				$this->view->message = 'Đã thêm item: ' . $item->getName();
			}
		}
		
		$this->view->form = $form;	
	}
	
	public function editItemAction() {
		$this->view->headTitle($this->config['title']['editMenuItem']);
		
		if ($this->request->getParam('id') != null) {
			$id = $this->request->getParam('id');
										
			$privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
			$currentItem = new Cloud_Model_MenuItem_CloudMenuItem();					 	
			$this->menuItemMapper->find($id, $currentItem);								
						
			$form = new Cloud_Form_Admin_MenuItem_Edit(array(
			      'item' => $currentItem,	
			      'privileges' => $privilegeMapper->getAccessPrivilege(),					               
			));									
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {	
					$values = $form->getValues();						
					$item = new Cloud_Model_MenuItem_CloudMenuItem($values);																					
					$this->menuItemMapper->save($item);										
					$this->menuItemMapper->updateHome($values['id'], $values['is_home'], $currentItem->getMenu_cat_id());
					$this->view->message = 'Đã sửa item: ' . $item->getName();
			}
		}
			
			$this->view->form = $form;
		}	
	}
	
	public function publishItemAction()
	{		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
				 
		if ($this->request->getParam('listid') != null) {			
			$listid = explode(",", $this->request->getParam('listid'));
			$mapper = $this->request->getParam('mapper');
			$dbTable = $this->$mapper->getDbTable();			
			Cloud_Model_Utli_CloudUtli::setPublish($dbTable, $listid);	
		}	
		else 
			echo 'error';							
	}
	
	public function unpublishItemAction()
	{		 
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->request->getParam('listid') != null) {				 			
			$listid = explode(",", $this->request->getParam('listid'));					 			
			$mapper = $this->request->getParam('mapper');
			$dbTable = $this->$mapper->getDbTable();
			Cloud_Model_Utli_CloudUtli::setUnPublish($dbTable, $listid);	
		}		
		else 
			echo 'error';						
	}	
	
	public function setPublishItemAction()
	{		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->request->getParam('id') != null) {							
			$id = $this->request->getParam('id');		 															 			
			$mapper = $this->request->getParam('mapper');
			$dbTable = $this->$mapper->getDbTable();
			Cloud_Model_Utli_CloudUtli::setPublishAjax($dbTable, $id);	
		}		
		else 
			echo 'error';
	}
	
	public function changeOrderAction()
	{		 
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);			
								
		$id = $this->request->getParam('id');
		$ordering = (int) $this->request->getParam('ordering');	
		$catId = $this->request->getParam('catId');		
		$type = $this->request->getParam('type');														
		
		if ($id != null && $catId != null && $type != null && $ordering != null || $ordering < 0 ) {																	 															 
			$this->menuItemMapper->changeOrder($id, $catId, $type, $ordering);									
		}		
		else 
			echo 'error';
	}
	
	public function deleteItemAction()
	{		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);		
				
		if (null != $this->request->getParam('id')) {			
			$id = $this->request->getParam('id');				
			$this->menuItemMapper->delete($id);
		}
	}
	
}