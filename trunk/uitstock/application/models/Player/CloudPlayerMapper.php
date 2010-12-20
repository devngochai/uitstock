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
				$salt = $player->getUsername();
				$password = $player->getPassword();
			}			
			
			$data = array(			   
				'level_id' => 1,
			    'username' => $player->getUsername(),
			    'email' => $player->getEmail(),
				'password' => md5($password . $salt),
				'full_name' => $player->getFull_name(),
			    'gender' => $player->getGender(),
				'birthday' => $birthday,
			    'mobile' => $player->getMobile(),
				'address' => $player->getAddress(),			    							   			    			    										    							 											    
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
		
		public function updatePassword($id, $username, $password)
		{
			$salt = $username;			 			
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
		
	    public function findPlayerByUsername($username)
		{													
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('username = ?', $username);			             
			             
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
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
		
		public function fetchUserOnline($from, $end)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPlayer = $this->getDbTable()->info();
			$dbPlayerName = $dbPlayer['name'];	

			$sessionMapper = new Cloud_Model_PlayerSession_CloudPlayerSessionMapper();
			$dbSession = $sessionMapper->getDbTable()->info();
			$dbSessionName = $dbSession['name'];			
				
			$select = $db->select()		                  
		                 ->from(array('a' => $dbPlayerName), array('id', 'username'))
		                 ->join(array('s' => $dbSessionName), 'a.id = s.user_id', array('ip', 'browser', 'last_visit'))
		                 ->order('s.last_visit desc')		                 		                 		                 
		                 ->limit($end, $from);		               		        	             			                            	

		                 
           return $db->fetchAll($select);
		}		

		public function getPlayerByUsername($username, $currentPlayer)
		{						
			if (null == $currentPlayer) $id = "";
			else $id = $currentPlayer->getId();
					
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('username = ?', $username)			             
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
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
			
			$salt = $currentPlayer->getUsername();			 			
				
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

		public function isValidate($username, $password)
		{			
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('password = ?', $password)			             
			             ->where('username = ?', $username)
			             ->where('is_enable = 1');
			$row = $db->fetchRow($select);														
			if ($row == null)
				return false;
																      				 			      		
			return true;
		}
		
		public function checkUsername($username)
		{
			$db = $this->getDbTable();
			$select = $db->select()			                							             
			             ->where('username = ?', $username);
			             			             
			$row = $db->fetchRow($select);														
			if ($row == NULL)
				return true;
																      				 			      		
			return false;
		}
		
		public function checkEmail($email)
		{
			$db = $this->getDbTable();
			$select = $db->select()			                							             
			             ->where('email = ?', $email);
			             			             
			$row = $db->fetchRow($select);														
			if ($row == NULL)
				return true;
																      				 			      		
			return false;
		}
		
		public function login($username, $password, $remember = null)
		{
			$currentPlayer = $this->findPlayerByUsername($username);
								
			$_SESSION['playerId'] = $currentPlayer->id;					
			$_SESSION['username'] = $currentPlayer->username;
			$_SESSION['player_name'] = $currentPlayer->full_name;	
			$_SESSION['money'] =  $currentPlayer->money;																							
			$_SESSION['player_log'] = true;
			
			if ($remember  == '1') {                            
                setcookie("Username", $username, time()+60*60*24*30, '/');
                setcookie("Password", $password, time()+60*60*24*30, '/');
           	} else {                       			
                setcookie("Username", "", time()-60*60*24*30, '/');
                setcookie("Password", "", time()-60*60*24*30, '/');                
           	}									
		}		
		
		public function getNumberUser()
		{
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->from($db, 'id');			             			            
                     
            return count($db->fetchRow($select));			
		}		
		
		public function getUserNameById($listId)
		{						
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->from($db, 'username')
			             ->where("id in ($listId)");			             			            
                     
            return $db->fetchAll($select);			
		}
		
		public function showPaging($page, $number, $link, $imgDir)
        {            
           	$db = Zend_DB_table_Abstract::getDefaultAdapter();	
           	
			$sessionMapper = new Cloud_Model_PlayerSession_CloudPlayerSessionMapper();
			$dbSession = $sessionMapper->getDbTable()->info();
			$dbSessionName = $dbSession['name'];	
			
			$stmt = $db->query("SELECT count(*) as count from $dbSessionName 
								WHERE user_id != 0");
			$row = $stmt->fetch();
									                                           
            $totalPages = ceil((int) $row['count'] / (int) $number);                         
            return $this->paging(1, $page, $totalPages, $link, $imgDir);
        } 

		public function paging($pageCount, $currentPage, $totalPages, $link, $imgDir)
        {
            if ($totalPages < 1) return "";                                           
                  
            $nav = "";                                
            $prev = "";
            $next = "";            
            $from = 1;         
            $to = $from + $pageCount;                                    
            if ($to > $totalPages) $to = $totalPages;
                   
            //$nextLink = $link . '\page\2';
            //$prevLink =  $link . '\page\1';
            
            //$next = "<a path=\"$nextLink\" class=\"btnPaging\">Next</a>"; 
			//$prev = "<a path=\"$prevlink\" class=\"btnPaging\">Previous</a>";
                   
 
            
//            for ($i = $from; $i <= $to; $i++)
//            {                                                            
//                 $qt = $link .  "\\page\\" . $i;
//                 $nav .= "<a path=\"$qt\">{$i}</a>";                  
//            }
            
            $data ="<span class=\"data\" first=\"1\" last=\"$totalPages\" path=\"admin/config/paging-ajax/\" ></span>";
            $first = "<img class=\"f\" type=\"disable\" src=\"$imgDir/paging/first.gif\" />";            
            $prev = "<img class=\"p\" type=\"disable\" src=\"$imgDir/paging/prev.gif\" />";
            $next = "<img class=\"n\" type=\"enable\" title=\"Trang sau\" path=\"$link\\page\\2\" src=\"$imgDir/paging/next.gif\" />";
            $last = "<img class=\"l\" type=\"enable\" title=\"Trang cuối\" path=\"$link\\page\\$totalPages\" src=\"$imgDir/paging/last.gif\" />";
			$nav =  "Page<input id=\"pageNumber\" type=\"text\" value=\"$currentPage\" size=\"2\" style=\"text-align: center;\" />of $totalPages";
			$refresh = "<img class=\"r\" type=\"enable\" title=\"Refresh\" path=\"$link\\page\\$totalPages\" src=\"$imgDir/paging/load.png\" />";
			$sep = "<div class=\"btnseparator\"></div>";
							            
            return $data.$sep.$first.$prev.$sep.$nav.$sep.$next.$last.$sep.$refresh;
        }		
	}