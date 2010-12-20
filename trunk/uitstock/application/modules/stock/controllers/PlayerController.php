<?php
class PlayerController extends ZendStock_Controller_Action {
	public $config;
	public $widgetMapper;	
	public $playerMapper;	
    
	public function init() {  
		 if (!isset($_SESSION['player_log'])) 
		 	$this->_redirect('auth/login/');
		 			   			 			 	
		 $templateMapper = new Cloud_Model_Template_CloudTemplateMapper();	  		
		 $themeMapper = new Cloud_Model_Theme_CloudThemeMapper(); 		  			     	           
	     $dirTemplate = $templateMapper->getTemplateDefault(2); 
		 $dirTheme = $themeMapper->getThemeDefault(2);		     	           
	     $this->config = $this->createLayout($dirTemplate, $dirTheme);	    

	     $this->widgetMapper = new Cloud_Model_Widget_CloudWidgetMapper();
	     $this->playerMapper = new Cloud_Model_Player_CloudPlayerMapper();   	 
	     	     			
		 $this->request = $this->getRequest();

		 $menuItemMapper = new Cloud_Model_MenuItem_CloudMenuItemMapper();
		 
		 $this->view->assign(array(			
    		'widgets' => $this->widgetMapper,
    		'menuItemMapper' => $menuItemMapper,
		 	'items' => $menuItemMapper->getItemByCat(5),		
		 	'playerMapper' => new Cloud_Model_Player_CloudPlayerMapper(),
		 	'session' => new Cloud_Model_PlayerSession_CloudPlayerSessionMapper(),		 
     	));			 
	}		

	public function inforAction()
	{				
		$this->view->headTitle($this->config['title']['information']);		
		$_SESSION['nav-main'] = 'Trang chủ';		
		 
	    $widgets = $this->widgetMapper->getWidgetByComponentPage(2, 'register');
	    
	    $currentPlayer = new Cloud_Model_Player_CloudPlayer();
		$this->playerMapper->find($_SESSION['playerId'], $currentPlayer);
			
	    $form = new Cloud_Form_Stock_ChangeInformation(array(
			  	'player' => $currentPlayer,	 					    			 			  		
			));
	    
	    if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {
				$player = new Cloud_Model_Player_CloudPlayer($form->getValues());
				$this->playerMapper->save($player);
				$_SESSION['player_name'] = $player->getFull_name();
				$this->view->message = 'Đã cập nhật thông tin thành viên';								
			}
		}

	    $this->view->assign(array(			
	    	'widgets' => $widgets,	
	    	'form' => $form,    		
	     ));
	} 
	     
	public function changePassAction()
	{				
		$this->view->headTitle($this->config['title']['ChangePassword']);		
		$_SESSION['nav-main'] = 'Trang chủ';		
		 
	    $widgets = $this->widgetMapper->getWidgetByComponentPage(2, 'register');
	    
	    $currentPlayer = new Cloud_Model_Player_CloudPlayer();
		$this->playerMapper->find($_SESSION['playerId'], $currentPlayer);
			
	    $form = new Cloud_Form_Stock_ChangePassword(array(
			  	'player' => $currentPlayer,	 					    			 			  		
			));
	    
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->request->getPost())) {			
				$values = $form->getValues();
				$id = $values['id'];
				$username = $values['username'];
				$password = $values['new_password'];					
				$this->playerMapper->updatePassword($id, $username, $password);												
				$this->view->message = 'Đã cập nhật mật khẩu thành viên';
			}
		}

	    $this->view->assign(array(			
	    	'widgets' => $widgets,	
	    	'form' => $form,    		
	     )); 		
	}
}