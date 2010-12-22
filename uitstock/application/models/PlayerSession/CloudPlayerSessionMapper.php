<?php
	/**
	 * Class        : PlayerSession Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_PlayerSession_CloudPlayerSessionMapper implements Cloud_Model_PlayerSession_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudPlayerSession');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_PlayerSession_CloudPlayerSession();			
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
		
		public function save(Cloud_Model_PlayerSession_CloudPlayerSession $playerSession)
		{											
			$data = array(			   
				'user_id' => $playerSession->getUser_id(),
			    'session_id' => $playerSession->getSession_id(),
			    'ip' => $playerSession->getIp(),
				'browser' => $playerSession->getBrowser(),
				'last_visit' => $playerSession->getLastVisit(),			
			);
					
			if (null == ($id = $playerSession->getId())) {			
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {																		
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}			
			
		public function find($id, Cloud_Model_PlayerSession_CloudPlayerSession $playerSession)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$playerSession->setId($row->id)
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
			$userId = ($_SESSION['playerId'] == null) ? "0" : $_SESSION['playerId'];
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
		
		public function getAllOnline()
		{
			$db = $this->getDbTable();
			$select = $db->select()
						 ->from($db, array('id'));			                				             			             
			             
			$row = $db->fetchAll($select);		

			return count($row);			
		}

		public function getUserOnline()
		{
			$db = $this->getDbTable();
			$select = $db->select()
						 ->from($db, array('user_id'))
						 ->where('user_id != 0')
						 ->order('last_visit desc');			                				             			             			             			

			return $db->fetchAll($select);				
		}
				
	}