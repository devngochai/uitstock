<?php
	/**
	 * Class        : UserSession Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_UserSession_CloudUserSessionMapper implements Cloud_Model_UserSession_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudUserSession');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_UserSession_CloudUserSession();			
			$entry->setId($row->id)
			      ->setUser_id($row->user_id)
			      ->setSession_id($row->session_id)
			      ->setIp($row->ip)
			      ->setBrowser($row->browser)
			      ->setLastVisit($row->last_visit);
			      				 				  
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
		
		public function save(Cloud_Model_UserSession_CloudUserSession $userSession)
		{											
			$data = array(			   
				'user_id' => $userSession->getUser_id(),
			    'session_id' => $userSession->getSession_id(),
			    'ip' => $userSession->getIp(),
				'browser' => $userSession->getBrowser(),
				'last_visit' => $userSession->getLastVisit(),			
			);
					
			if (null == ($id = $userSession->getId())) {			
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {																		
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}			
			
		public function find($id, Cloud_Model_UserSession_CloudUserSession $userSession)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$userSession->setId($row->id)
			              ->setUser_id($row->user_id)
			              ->setSession_id($row->session_id)
			              ->setIp($row->ip)
			              ->setBrowser($row->browser)
			              ->setLastVisit($row->last_visit);   
		}	
		
		public function deleteSession($userId)
		{
			$db = $this->getDbTable();
			$where = $db->getAdapter()->quoteInto('user_id = ?', $userId);			
			$db->delete($where);			
		}
					
		public function checkOnline()
		{
			$ip = $_SERVER['REMOTE_ADDR'];
			$browser = mysql_real_escape_string($_SERVER['HTTP_USER_AGENT']);			
									
			$userId = $_SESSION['userId'];
			$time = time();
			$sessionTime = 900;
			$timeCheck = $time - $sessionTime;
			$sessionId = session_id();			
					
			
			$data = array(			
				'user_id' => $userId,		
				'session_id' => $sessionId,				   									    
			    'ip' => $ip,
				'browser' => $browser,
				'last_visit' => $time,								    			    					
			);			
			
			$db = $this->getDbTable();
			$select = $db->select()
						 ->from($db, array('id'))			                	
			             ->where('session_id = ?', $sessionId)
			             ->where('user_id = ?', $userId);			             
			             
			$row = $db->fetchRow($select);			
																
			if ($row != null) {
				unset($data['user_id']);
				unset($data['session_id']);
				$this->getDbTable()->update($data, array('id = ?' => $row->id));
			} else {
				$db->insert($data);
			}
						
			$where = $db->getAdapter()->quoteInto('last_visit < ?', $timeCheck);			
			$db->delete($where);											
		}

	}