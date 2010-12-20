<?php
class Admin_PlayerController extends ZendStock_Controller_Action {
	public $config;		
	public $request;
	public $templateMapper;
	public $themeMapper;
	public $playerMapper;
    
	public function init() { 
		 if (!isset($_SESSION['log']))
		 	$this->_redirect('admin/index/error');
		 			
		 $this->templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $this->themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 
		 $this->playerMapper = new Cloud_Model_Player_CloudPlayerMapper();		 		 					     	           
	     $dirTemplate = $this->templateMapper->getTemplateDefault(1); 
		 $dirTheme = $this->themeMapper->getThemeDefault(1);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    
	        	    		 		 			 
		 $this->request = $this->getRequest();	
	}				
	
	public function listAction() {
		$this->view->headTitle($this->config['title']['player']);		
		$_SESSION['temp'] = $_SERVER['REQUEST_URI'];
		
		$page = $this->_getParam('page', 1);	
		
		$username = $this->request->getParam('username');
		if (null == $username) 
			$players = $this->playerMapper->fetchAll($page);			    		
		else
			$players = $this->playerMapper->searchPlayer($username);

		$this->view->assign(array(
			'players' => $players,			    		   
		));										  		     		     		
	}
	
	public function viewAction()
	{
		$this->view->headTitle($this->config['title']['viewPlayer']);
		
		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			
			$currentPlayer = new Cloud_Model_Player_CloudPlayer();
			$this->playerMapper->find($id, $currentPlayer);											
														
			$this->view->assign(array(			
	    		'player' => $currentPlayer,	 			    			  
	    	));
		}		
	}

	public function editAction() { 		 
		$this->view->headTitle($this->config['title']['editPlayer']);

		if (null != $this->request->getParam('id')) {
			$id = $this->request->getParam('id');
			
			$currentPlayer = new Cloud_Model_Player_CloudPlayer();
			$this->playerMapper->find($id, $currentPlayer);
						
			$form = new Cloud_Form_Admin_Player_Edit(array(
			  	'player' => $currentPlayer,	 					    			 			  		
			));
			
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {								
					$player = new Cloud_Model_Player_CloudPlayer($form->getValues());
					$this->playerMapper->save($player);																	
					$this->view->message = 'Đã thay đổi thông tin người chơi : ' . $currentPlayer->full_name;
				}
			}
			
			$this->view->form = $form;
		}					
	}
		
	public function changePasswordAction()
	{		
		$this->view->headTitle($this->config['title']['changePassword']);
		
		if (null != $this->request->getParam('id')) {		
			$id = $this->request->getParam('id');

			$currentPlayer = new Cloud_Model_Player_CloudPlayer();
			$this->playerMapper->find($id, $currentPlayer);

			$form = new Cloud_Form_Admin_Player_ChangePassword(array(
			  	'player' => $currentPlayer,	 					    			 			  		
			));	

			if ($this->getRequest()->isPost()) {
				if ($form->isValid($this->request->getPost())) {			
					$values = $form->getValues();
					$id = $values['id'];
					$username = $values['username'];
					$password = $values['new_password'];					
					$this->playerMapper->updatePassword($id, $username, $password);												
					$this->view->message = 'Đã thay đổi mật khẩu thành viên : ' . $currentPlayer->full_name;
				}
			}
			
			$this->view->assign(array(			
	    		'player' => $currentPlayer,	 	
				'form' => $form,			  
	    	));						
		}
	}
	
	public function enableAction()
	{		 
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
				 
		if ($this->request->getParam('listid') != null) {			
			$listid = explode(",", $this->request->getParam('listid'));
			$mapper = $this->request->getParam('mapper');
			$dbTable = $this->$mapper->getDbTable();			
			Cloud_Model_Utli_CloudUtli::setEnable($dbTable, $listid);	
		}	
		else 
			echo 'error';							
	}
	
	public function disableAction()
	{		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->request->getParam('listid') != null) {				 			
			$listid = explode(",", $this->request->getParam('listid'));					 			
			$mapper = $this->request->getParam('mapper');
			$dbTable = $this->$mapper->getDbTable();
			Cloud_Model_Utli_CloudUtli::setDisable($dbTable, $listid);	
		}		
		else 
			echo 'error';						
	}	
	
	public function setEnableAction()
	{		 
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		if ($this->request->getParam('id') != null) {							
			$id = $this->request->getParam('id');		 															 			
			$mapper = $this->request->getParam('mapper');
			$dbTable = $this->$mapper->getDbTable();
			Cloud_Model_Utli_CloudUtli::setEnableAjax($dbTable, $id);	
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
			$this->playerMapper->deleteAll($listid);
		}								
	}
	
	public function autoSuggestionAction()
	{
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);	
				
		$username = $this->request->getParam('name');				
		$result = $this->playerMapper->autoSuggestion($username);					
		if ($result) {			
			echo '<ul>';
			foreach ($result as $row) {
				echo '<li onClick="fill(\''.$row->username.'\');">'.$row->username.'</li>';	
			}
			echo '</ul>';
		} 
	}
}