<?php
	/**
	 * Class        : Role Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Role_CloudRoleMapper implements Cloud_Model_Role_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudRole');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_Role_CloudRole();			
			$entry->setId($row->id)			   
				  ->setName($row->name)
				  ->setDescription($row->description);				  				 				  
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
		
		public function save(Cloud_Model_Role_CloudRole $role)
		{			
			$data = array(			    
				'name' => $role->getName(),
				'description' => $role->getDescription(),								 
			);
			
			if (null == ($id = $role->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}		
		
		public function find($id, Cloud_Model_Role_CloudRole $role)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$role->setId($row->id)			   
				 ->setName($row->name)
				 ->setDescription($row->description);	 		   
		}
		
		public function fetchAll()
		{										
			return $this->getDbTable()->fetchAll();	
		}	    

		public function saveAll($data)
		{
			$data2 = array(			   
				'name' => $data['name'],
				'description' => $data['description'],														   							 
			);
								
			if (null == ($id = $data['id'])) {				
				$db = $this->getDbTable();
				$db->insert($data2);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data2, array('id = ?' => $id));		
			}			
		}
		
		public function delete($id)
		{						
			$db = $this->getDbTable();					
			$where = $db->getAdapter()->quoteInto('id = ?', $id);
			$db->delete($where);				
		}	
		
		public function checkUniqueName($name, $id = null)		
		{
			if (null == $id) $id = '';
			
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('name = ?', $name)			          
			             ->where('id != ?', $id);
			             
			return $db->fetchRow($select);		
		}				
	}