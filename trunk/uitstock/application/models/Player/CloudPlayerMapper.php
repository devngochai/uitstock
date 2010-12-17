<?php
	/**
	 * Class        : Player Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Player_CloudPlayerMapper implements Cloud_Model_Player_Interface
	{
		protected $_dbTable;
		
		public function setDbTable($dbTable)
		{
			if (is_string($dbTable)) {
				$dbTable = new $dbTable;
			}
			if (!$dbTable instanceof Zend_Db_Table_Abstract) {
				throw new Exception('Invalid table data gateway provided');
			}
			$this->_dbTable = $dbTable;
			return $this;
		}
		
		public function getDbTable()
		{
			if (null == $this->_dbTable) {
				$this->setDbTable('Cloud_Model_DbTable_CloudPlayer');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_Player_CloudPlayer();			
			$entry->setId($row->id)
			      ->setLevel_id($row->level_id)
			      ->setUsername($row->username)
			      ->setPassword($row->password)
			      ->setFull_name($row->full_name)
			      ->setGender($row->gender)
			      ->setBirthday($row->birthday)
			      ->setAddress($row->address)
			      ->setEmail($row->email)	
			      ->setMobile($row->mobile)
			      ->setJob($row->job)
			      ->setCompany($row->company)
			      ->setIs_enable($row->is_enable)			      			      
			      ->setMoney($row->money);
			      				 				  
			return $entry;
		}
		
		public function getEntries($rows)
		{			
			$entries = array();
            foreach ($rows as $row) {            	 	            	       	      
                $entries[] = $this->getEntry($row);            	         
            }     
            return $entries;
		}		
		
		public function save(Cloud_Model_Player_CloudPlayer $player)
		{					
			if ($player->getBirthday() != '') {				
				$birthday =  Cloud_Model_Utli_CloudUtli::showDateDB($player->getBirthday()); 						
			}		
			
			if ($player->getPassword() != '') {
				$salt = md5($player->getEmail());
				$password = md5($player->getPassword());
			}			
			
			$data = array(			   
				'level_id' => 1,
			    'username' => $player->getUsername(),
				'password' => md5($password . $salt),
				'full_name' => $player->getFull_name(),
			    'gender' => $player->getGender(),
				'birthday' => $birthday,
			    'address' => $player->getAddress(),
			    'email' => $player->getEmail(),
				'mobile' => $player->getMobile(),			   			    			    										    							 											    
			    'job' => $player->getJob(),
				'company' => $player->getCompany(),
			    'is_enable' => $player->getIs_enable(), 
				'money' => 1000000, 			
			);
					
			if (null == ($id = $player->getId())) {			
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				unset($data['password']);	
				unset($data['level_id']);
				unset($data['money']);						
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}			
		
		public function updatePassword($id, $email, $password)
		{
			$salt = md5($email);
			$password = md5($password); 			
			$data = array('password' => md5($password . $salt));
			$where = array('id = ?' => $id);
			$this->getDbTable()->update($data, $where);
		}
		
		public function find($id, Cloud_Model_Player_CloudPlayer $player)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$player->setId($row->id)
			       ->setLevel_id($row->level_id)
			       ->setUsername($row->username)
			       ->setPassword($row->password)
			       ->setFull_name($row->full_name)
			       ->setGender($row->gender)
			       ->setBirthday($row->birthday)
			       ->setAddress($row->address)
			       ->setEmail($row->email)	
			       ->setMobile($row->mobile)
			       ->setJob($row->job)
			       ->setCompany($row->company)
			       ->setIs_enable($row->is_enable)			      			      
			       ->setMoney($row->money);	   
		}	
		
		public function searchPlayer($username)
		{
			if (null == $username) exit();			   

            $db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPlayer = $this->getDbTable()->info();
			$dbPlayerName = $dbPlayer['name'];													
				
			$select = $db->select()		                  
		                 ->from(array('u' => $dbPlayerName))		     
		                 ->where('username = ?', $username); 		     		                             		                 		                 		                 		                 		               		        	           
			    
            $rows = $db->fetchAll($select);           
           
            $paginator = Zend_Paginator::factory($rows);
     	    $paginator->setItemCountPerPage(6);
      	    $paginator->setCurrentPageNumber($page);           		
                     
            return $paginator; 
		}
					
		public function deleteAll($listid)
		{
			for ($i = 0; $i < count($listid); $i++) {	
				$id = $listid[$i]; 						
				$player = new Cloud_Model_Player_CloudPlayer();		 		
				$this->find($id, $player);		
				if (null == $player) echo 'error';			
				else {					
					$db = $this->getDbTable();					
					$where = $db->getAdapter()->quoteInto('id = ?', $id);
					$db->delete($where);
				}										
			}
		}
		
		public function fetchAll($page)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPlayer = $this->getDbTable()->info();
			$dbPlayerName = $dbPlayer['name'];													
				
			$select = $db->select()		                  
		                 ->from(array('u' => $dbPlayerName));		     		                             		                 		                 		                 		                 		               		        	           
			    
           $rows = $db->fetchAll($select);           
           
           $paginator = Zend_Paginator::factory($rows);
    	   $paginator->setItemCountPerPage(6);
    	   $paginator->setCurrentPageNumber($page);           		
                     
           return $paginator;  
		}		
		
		public function getPlayerByEmail($email, $currentPlayer)
		{						
			if (null == $currentPlayer) $id = "";
			else $id = $currentPlayer->getId();
					
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('email = ?', $email)			             
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
		}

		public function getPlayerByPassword($password, $currentPlayer)
		{						
			if (null == $currentPlayer) $id = "";
			else $id = $currentPlayer->getId();
			
			$salt = md5($currentPlayer->getEmail());
			$password = md5($password); 			
				
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('password = ?', md5($password . $salt))
			             ->where('id = ?', $id);		
			             	             			             
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
		}	
		
		public function autoSuggestion($username)
		{
			if (null == $username) exit();	
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->from($db, array('username'))
			             ->where('username like ?', "%$username%");			             			                               
                   
            return $db->fetchAll($select);            
		}	
	}