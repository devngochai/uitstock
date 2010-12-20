<?php
		$userNumber = $this->playerMapper->getNumberUser();
		$this->session->checkOnline();
		$userOnlineNumber = $this->session->getAllOnline();
		$playerOnline = $this->session->getUserOnline();		
			
		$playerOnlineNumber = count($playerOnline);
		$list = "";
		
		if ($playerOnlineNumber > 0) {
			$listId = "";
			
			foreach ($playerOnline as $row)
				$listId = $listId . "," . $row->user_id;
				
			$listId = substr($listId, 1);
					
			$playerOnlineUserName = $this->playerMapper->getUserNameById($listId);		
			 
			foreach ($playerOnlineUserName as $row)
				$list = $list . ", " . $row->username;
			$list = substr($list, 1);				
													
		}
		
		include("view.phtml"); 
?>