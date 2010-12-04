<?php
class Admin_ArticleController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $articleMapper;
	public $contentCategoryMapper;
    
	public function init() {    		
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->articleMapper = new Cloud_Model_Article_CloudArticleMapper();		
		 $this->contentCategoryMapper = new Cloud_Model_ContentCategory_CloudContentCategoryMapper();			     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    
		 session_start();
		 $_SESSION['log'] = true;			 
		 $this->request = $this->getRequest();		 		 		 	
	}	
	
	public function listCategoryAction()
	{
		$this->view->headTitle($this->config['title']['category']);	
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];	

		$name = $this->request->getParam('name');
		$page = $this->_getParam('page', 1);

		if (null == $name) {
			$parents = $this->contentCategoryMapper->fetchParentByPage($page);
			$subs = $this->contentCategoryMapper->fetchAllSub();
		} else 
			$parents = $this->contentCategoryMapper->searchCat($name);
						    
	    $this->view->assign(array(
	    		'parents' => $parents,
	    		'subs' => $subs,
	    ));
	}
	
	public function viewCatAction()
	{
		$this->view->headTitle($this->config['title']['viewCategory']);
		
		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			$currentCategory = new Cloud_Model_ContentCategory_CloudContentCategory();
			$this->contentCategoryMapper->find($id, $currentCategory);
			
			$sub = $this->contentCategoryMapper->getSubNameById($currentCategory->parent_id);
			if (null != $sub->name) $sub = $sub->name;
								
			$this->view->assign(array(			
	    		'category' => $currentCategory,
	    		'sub' => $sub,
	    	));
		}		
	}
	
	public function addCatAction()
	{
		$this->view->headTitle($this->config['title']['addCategory']);		  
	    
	    $form = new Cloud_Form_Admin_ContentCategory_Add(array(
			'parents' => $this->contentCategoryMapper->fetchAllParent(),						
		));

		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {			
				$values = $form->getValues();
				$category = new Cloud_Model_ContentCategory_CloudContentCategory($values);
				$newId = $this->contentCategoryMapper->save($category);
				$this->contentCategoryMapper->updateAlias($newId, $values['name']);																	
				$this->view->message = 'Đã thêm loại tin: ' . $values['name'];
			}
		}
		
		$this->view->form = $form;
	}
	
	public function editCatAction()
	{
		$this->view->headTitle($this->config['title']['editCategory']);

		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			$currentCategory = new Cloud_Model_ContentCategory_CloudContentCategory();
			$this->contentCategoryMapper->find($id, $currentCategory);
		
			$form = new Cloud_Form_Admin_ContentCategory_Edit(array(
			  'category' => $currentCategory,		
			  'parents' => $this->contentCategoryMapper->fetchAllParent(),				
			));
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$values = $form->getValues();
					$category = new Cloud_Model_ContentCategory_CloudContentCategory($values);
					$this->contentCategoryMapper->save($category);
					$this->contentCategoryMapper->updateAlias($values['id'], $values['name']);																	
					$this->view->message = 'Đã sửa loại tin: ' . $values['name'];
				}
			}
			
			$this->view->form = $form;
		}		
	}
	
	public function deleteCatAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if (null != $this->request->getParam('id')) {			
			$id = $this->request->getParam('id');				
			$this->contentCategoryMapper->delete($id);
		}
	}
		
	public function publishAction()
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
	
	public function unpublishAction()
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
	
	public function setPublishAction()
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
	
	public function autoSuggestionCatAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);	
				
		$name = $this->request->getParam('name');				
		$result = $this->contentCategoryMapper->autoSuggestionCat($name);
		if ($result) {			
			echo '<ul>';
			foreach ($result as $row) {
				echo '<li onClick="fill(\''.$row->name.'\');">'.$row->name.'</li>';	
			}
			echo '</ul>';
		} 
	}	
	
	public function listArticleAction()
	{
		$this->view->headTitle($this->config['title']['article']);	
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];	

		$name = $this->request->getParam('name');
		$page = $this->_getParam('page', 1);

		if (null == $name) 
			$articles = $this->articleMapper->fetchArticleByPage($page);
		 else 
			$articles = $this->articleMapper->searchArticle($name);
		
		$this->view->articles = $articles;	
	}
	
	public function viewArticleAction()
	{
		$this->view->headTitle($this->config['title']['viewArticle']);
		
		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			$article = $this->articleMapper->getArticleById($id);

			$entries = $this->articleMapper->fetchAll();
			
			$this->view->assign(array(			
	    		'entries' => $entries,
	    		'article' => $article,
	    	));			
		}		
	}
	
	public function addArticleAction()
	{
		$this->view->headTitle($this->config['title']['addArticle']);		  
	    
	    $form = new Cloud_Form_Admin_Article_Add(array(
	    	'categories' => $this->contentCategoryMapper->fetchAllSub(),
	    ));	    
	    
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {			
				$values = $form->getValues();	
				$article = new Cloud_Model_Article_CloudArticle($values);
				$newId = $this->articleMapper->save($article);
				$this->articleMapper->updateImage($newId, $values['path']);
				$this->articleMapper->updateAlias($newId, $values['title']);
				$this->articleMapper->updateRelative($newId, $values['listid_relative']);																					
				$this->view->message = 'Đã thêm tin: ' . $values['title'];
			}
		}
		$this->view->form = $form;	
	}
	
	public function editArticleAction()
	{
		$this->view->headTitle($this->config['title']['editArticle']);

		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			$currentArticle = new Cloud_Model_Article_CloudArticle();
			$this->articleMapper->find($id, $currentArticle);						
		
			$form = new Cloud_Form_Admin_Article_Edit(array(
				'article' => $currentArticle,
			  	'categories' => $this->contentCategoryMapper->fetchAllSub(),
			    'entries' => $this->articleMapper->fetchAll(),							
			));
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {								
					$values = $form->getValues();
					$id = $values['id'];	
					$image = $currentArticle->getImage();
					$article = new Cloud_Model_Article_CloudArticle($values);
					$this->articleMapper->save($article);
					if ($values['up'] == 1)
						$this->articleMapper->updateImage($id, $values['path']);
					else
						$this->articleMapper->updateImage2($id, $image, $values['path'], $values['fileName']);
					$this->articleMapper->updateAlias($id, $values['title']);
					$this->articleMapper->updateRelative($id, $values['listid_relative']);																					
					$this->view->message = 'Đã sửa tin: ' . $values['title'];
				}
			}
			
			$this->view->form = $form;
		}		
	}
			
}