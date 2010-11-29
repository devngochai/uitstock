<?php
class Admin_WidgetController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $widgetMapper;
	public $pagewidgetMapper;
    
	public function init() {    		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->widgetMapper = new Cloud_Model_Widget_CloudWidgetMapper(); 	
		 $this->pagewidgetMapper = new Cloud_Model_PageWidget_CloudPageWidgetMapper();		     	           		 
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    
		 session_start();
		 $_SESSION['log'] = true;			 
		 $this->request = $this->getRequest();		 		 		 	
	}				
	
	public function listAction() {
		$this->view->headTitle($this->config['title']['widget']);		
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];			
		
		$componentMapper = new Cloud_Model_Component_CloudComponentMapper();		
		$components = $componentMapper->fetchAllByFront();		
		$component_1 = $components[0];								
											
		$component_id = $this->request->getParam('component');			
		$c = (null == $component_id) ? $component_1->id : $component_id;
		
		$pageMapper = new Cloud_Model_Page_CloudPageMapper();
		$pages = $pageMapper->getPageByComponent($c);	
		$page_1 = $pages[0];	
			
		$alias = $this->request->getParam('alias');
		if (null == $alias) 
			$widgets = $this->widgetMapper->getWidgetbyPage($page_1->id);						
		else
			$widgets = $this->widgetMapper->searchWidget($alias, $page_1->id);
											     	
		$this->view->c = $c;		
        $this->view->components = $components;    
        $this->view->pages =  $pages;
        $this->view->widgets = $widgets;
		$this->view->pagewidget = $this->pagewidgetMapper;
		$this->view->pageId = $page_1->id;		
	}  
	
	public function listWidgetAction()
	{			
		$this->_helper->layout()->disableLayout();		
			
		if ($this->request->getParam('componentId') != null && $this->request->getParam('pageId') != null) {							
			$componentId = $this->request->getParam('componentId');		 															 			
			$pageId = $this->request->getParam('pageId');
			$widgets = $this->widgetMapper->getWidgetbyPage($pageId);	
			$this->view->widgets = $widgets;
			$this->view->pageId = $pageId;
			$this->view->pagewidget = $this->pagewidgetMapper;
		}				
	}
	
	public function addAction() 
	{					
		$this->view->headTitle($this->config['title']['addWidget']);
		
		$componentMapper = new Cloud_Model_Component_CloudComponentMapper();
		$components = $componentMapper->fetchAllByFront();	
		$this->view->components = $components;		

		if (isset($_POST['ok'])) {			
			$newId = $this->widgetMapper->saveAll();
			$this->pagewidgetMapper->saveAll($newId);		
			$this->view->message = 'Đã thêm widget: ' . $_POST['name'];		
		}					
	}		

	public function addContAction()
	{
		$this->_helper->layout()->disableLayout();			
		
		$componentId = $this->request->getParam('componentId');
		$listPageId = $this->request->getParam("listPageId");
		$name = $this->request->getParam("name");
		$alias = $this->request->getParam('alias');	
		
		$widgetNameList = $this->widgetMapper->checkUniqueWidgetName($componentId, $listPageId, $name);
		$widgetAliasList = $this->widgetMapper->checkUniqueWidgetAlias($componentId, $listPageId, $alias);				
		
		if (count($widgetNameList) > 0) {
			echo 'duplicate1@';			
			echo 'Tên widget đã tồn tại trong page ';
			for ($i = 0; $i < count($widgetNameList); $i++)
				echo $widgetNameList[$i];
			exit();
		}

		if (count($widgetAliasList) > 0) {
			echo 'duplicate2@';			
			echo 'Alias đã tồn tại trong page ';
			for ($i = 0; $i < count($widgetAliasList); $i++)
				echo $widgetAliasList[$i];
			exit();
		}
									
		$path = $this->request->getParam("path");				 	
		
		$published = $this->request->getParam("published");		
			
		$pageArray = explode(',', $listPageId);
		$orthers = '';
		if (count($pageArray) == 1) {
			$orders = $this->pagewidgetMapper->getOrderByPage($listPageId);	
		} 
				
		$this->view->orders = $orders;
		$this->view->listPageId = $listPageId;		
		$this->view->path = $path;
		$this->view->name = $name;
		$this->view->published = $published;		
		$this->view->alias = $alias;
	}
	
	public function getOrderByPositionAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		$position = $this->request->getParam('Id1');
		$pageId = $this->request->getParam('Id2');
		$positionCurrent = $this->request->getParam('Id3');			
		
		$orders = $this->pagewidgetMapper->getOrderByPage($pageId, $position);			
		for ($i = 1; $i <= count($orders); $i++) {		
			echo '<option value="'.$orders[$i] . '">' .$orders[$i] . '</option>';
		}
		if ($position != $positionCurrent) {
			$maxOrder = (int) $this->pagewidgetMapper->getMaxOrder($pageId, $position) + 1;			
			echo '<option value="'. $maxOrder . '">' . $maxOrder . '</option>';	
		}			
	}

	public function editAction()
	{
		$this->view->headTitle($this->config['title']['editWidget']);
		
		$pageWidgetId = $this->request->getParam('id');		
		$widget = $this->widgetMapper->getWidgetbyPageWidget($pageWidgetId);
				
		$componentId = $widget['component_id'];
		$pageMapper = new Cloud_Model_Page_CloudPageMapper();
		$pages = $pageMapper->getPageByComponent($componentId);
		
		$this->view->componentId = $componentId;
		$this->view->pageWidgetId = $pageWidgetId;
		$this->view->widget = $widget;				
		$this->view->pages = $pages;

		if (isset($_POST['ok'])) {									
			$this->widgetMapper->updateAll();
			$this->pagewidgetMapper->updateAll();
			//header('location: http://' . $_SERVER['SERVER_NAME'] . '/' .$_SERVER['REQUEST_URI']);						
		}	
	}
	
	public function editContAction()
	{
		$this->_helper->layout()->disableLayout();			
		
		$componentId = $this->request->getParam('componentId');
		$pageId = $this->request->getParam("pageId");
		$name = $this->request->getParam("name");
		$alias = $this->request->getParam('alias');	
		$widgetId = $this->request->getParam('widgetId');
		
		$widgetName = $this->widgetMapper->checkUniqueWidgetName($componentId, $pageId, $name, $widgetId);
		$widgetAlias = $this->widgetMapper->checkUniqueWidgetAlias($componentId, $pageId, $alias, $widgetId);						
		
		if (count($widgetName) > 0) {
			echo 'duplicate1@';			
			echo 'Tên widget đã tồn tại trong page ' . $widgetName[0];			
			exit();
		}

		if (count($widgetAlias) > 0) {
			echo 'duplicate2@';			
			echo 'Alias đã tồn tại trong page ' . $widgetAlias[0];						
			exit();
		}
																		
		$pageWidgetId = $this->request->getParam('pageWidgetId');					
		$path = $this->request->getParam("path");				 			
		$published = $this->request->getParam("published");	
		$position = $this->request->getParam('position');
		$ordering = $this->request->getParam('ordering');
		
		$orders = $this->pagewidgetMapper->getOrderByPage($pageId, $position);
		 				
		$this->view->orders = $orders;
		$this->view->pageId = $pageId;		
		$this->view->path = $path;
		$this->view->name = $name;
		$this->view->published = $published;		
		$this->view->alias = $alias;				
		$this->view->widgetId = $widgetId;
		$this->view->pageWidgetId = $pageWidgetId;
		$this->view->position = $position;
		$this->view->ordering = $ordering;							
	}
	
	public function autoSuggestionWidgetAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);	
				
		$alias = $this->request->getParam('name');						
		$result = $this->widgetMapper->autoSuggestionWidget($alias);					
		if ($result) {			
			echo '<ul>';
			foreach ($result as $row) {
				echo '<li onClick="fill(\''.$row->alias.'\');">'.$row->alias.'</li>';	
			}
			echo '</ul>';
		} 
	}		
	
	public function publishAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
				 
		if ($this->request->getParam('listid') != null) {			
			$listid = explode(",", $this->request->getParam('listid'));
			$this->pagewidgetMapper->setPublish($listid);	
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
			$this->pagewidgetMapper->setUnPublish($listid);	
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
			$this->pagewidgetMapper->deleteAll($listid);
		}								
	}
	
	public function setPublishAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->request->getParam('id') != null) {							
			$id = $this->request->getParam('id');		 															 			
			$this->pagewidgetMapper->setPublishAjax($id);	
		}		
		else 
			echo 'error';
	}
	
	public function changeOrderAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);			
				
		$type = $this->request->getParam('type');		
		$id = $this->request->getParam('id');
		$ordering = (int) $this->request->getParam('ordering');			
		$position = $this->request->getParam('position');		
		$pageId = $this->request->getParam('pageId');								
		
		if ($type != null && $id != null && $ordering != null || $ordering < 0 ) {																	 															 
			$this->pagewidgetMapper->changeOrder($type, $id, $pageId, $position, $ordering);											
		}		
		else 
			echo 'error';
	}
}