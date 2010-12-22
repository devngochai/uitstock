<?php
	/**
	 * Class        : Role Privilege Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_RolePrivilege_CloudRolePrivilegeMapper implements Cloud_Model_RolePrivilege_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudRolePrivilege');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_RolePrivilege_CloudRolePrivilege();			
			$entry->setId($row->id)			   
				  ->setRole_id($row->role_id)
				  ->setPri_id($row->pri_id);				  				 				  
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
		
		public function save(Cloud_Model_RolePrivilege_CloudRolePrivilege $rolePrivilege)
		{			
			$data = array(			    
				'role_id' => $rolePrivilege->getRole_id(),
				'pri_id' => $rolePrivilege->getPri_id(),								 
			);
			
			if (null == ($id = $rolePrivilege->getId())) {				
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}		
		
		public function find($id, Cloud_Model_RolePrivilege_CloudRolePrivilege $rolePrivilege)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$rolePrivilege->setId($row->id)			   
				          ->setRole_id($row->role_id)
				          ->setPri_id($row->pri_id);	 		   
		}
		
		public function fetchAll()
		{										
			return $this->getDbTable()->fetchAll();	
		}	    

		public function saveAll($data, $roleId, $id = null)
		{			
			foreach ($data as $entry) {				
				$data2 = array(			   
					'role_id' => (int) $roleId,
					'pri_id' => (int) $entry,														   							 
				);
									
				if (null == $id) {									
					$db = $this->getDbTable();
					$db->insert($data2);					
				} else {
					$this->getDbTable()->update($data2, array('id = ?' => $id));		
				}			
			}			
		}	
		
		public function delete($id)
		{						
			$db = $this->getDbTable();					
			$where = $db->getAdapter()->quoteInto('role_id = ?', $id);
			$db->delete($where);				
		}	

		public function getRolePrivilegeByRole($id)
		{
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('role_id = ?', $id);			          			            
			             
			return $db->fetchAll($select);		
		}
	}