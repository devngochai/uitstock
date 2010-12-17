<?php
	/**
	 * Class        : Privilege Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Privilege_CloudPrivilegeMapper implements Cloud_Model_Privilege_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudPrivilege');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_Privilege_CloudPrivilege();			
			$entry->setId($row->id)
			      ->setModule_id($row->module_id)
			      ->setPri_type_id($row->pri_type_id)				  
				  ->setOrdering($row->ordering);				  				 				  
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
		
		public function save(Cloud_Model_Privilege_CloudPrivilege $privilege)
		{			
			$data = array(			   
				'module_id' => $privilege->getModule_id(),
				'pri_type_id' => $privilege->getPri_type_id(),
				'ordering' => $privilege->getOrdering(),											    							 
			);
			
			if (null == ($id = $privilege->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}	
		
		public function saveAll($data, $id)
		{
			$data2 = array(			   
				'module_id' => $data['module_id'],
				'pri_type_id' => $id,
				'ordering' => $this->getMaxOrder($data['module_id']) + 1,							   							 
			);
								
			if (null == ($id = $data['privilege_id'])) {
				$db = $this->getDbTable();
				$db->insert($data2);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data2, array('id = ?' => $id));		
			}			
		}
		public function find($id, Cloud_Model_Privilege_CloudPrivilege $privilege)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$privilege->setId($row->id)
			          ->setModule_id($row->module_id)
			          ->setPri_type_id($row->pri_type_id)				  
				      ->setOrdering($row->ordering);		   
		}
		
		public function delete($id)
		{						
			$db = $this->getDbTable();					
			$where = $db->getAdapter()->quoteInto('id = ?', $id);
			$db->delete($where);				
		}	
		
		public function update($moduleId, $privilegeId)
		{			
			$db = $this->getDbTable();					
			$where = $db->getAdapter()->quoteInto('module_id = ?', $moduleId);
			$db->delete($where);						
			
			for($i = 0; $i < count($privilegeId); $i++) {
				$data = array(			   
					'module_id' => $moduleId,
					'pri_type_id' => $privilegeId[$i],
					'ordering' => $this->getMaxOrder($moduleId) + 1,											    							 
				);
				$db->insert($data);	
			}
		}
		
		public function fetchAllPrivilege()
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPrivilege = $this->getDbTable()->info();
			$dbPrivilegeName = $dbPrivilege['name'];			
			
			$privilegeTypeMapper = new Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper();
			$dbPrivilegeType= $privilegeTypeMapper->getDbTable()->info();
			$dbPrivilegeTypeName = $dbPrivilegeType['name'];					
				
			$select = $db->select()		                  
		                 ->from(array('p' => $dbPrivilegeName), array('module_id', 'id as priId'))		                 
		                 ->join(array('pt' => $dbPrivilegeTypeName), 'p.pri_type_id = pt.id')		               
		                 ->order('p.ordering asc');			           
			    
           return $db->fetchAll($select);   
		}	
		
		public function getPrivilegeById($id)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPrivilege = $this->getDbTable()->info();
			$dbPrivilegeName = $dbPrivilege['name'];

			$moduleMapper = new Cloud_Model_Module_CloudModuleMapper();
			$dbModule = $moduleMapper->getDbTable()->info();
			$dbModuleName = $dbModule['name'];
			
			$privilegeTypeMapper = new Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper();
			$dbPrivilegeType= $privilegeTypeMapper->getDbTable()->info();
			$dbPrivilegeTypeName = $dbPrivilegeType['name'];					
				
			$select = $db->select()		                  
		                 ->from(array('p' => $dbPrivilegeName), array('id as privilege_id'))		     
		                 ->join(array('m' => $dbModuleName), 'p.module_id = m.id', array('id as module_id', 'name as module_name'))            
		                 ->join(array('pt' => $dbPrivilegeTypeName), 'p.pri_type_id = pt.id')
		                 ->where('p.id = ?', $id);		               		              
			    
           return $db->fetchRow($select);  
		}

		public function getMaxOrder($moduleId)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	
			
			$stmt = $db->query("SELECT max(ordering) as max from privileges
			                    WHERE module_id = $moduleId");
			$row = $stmt->fetch();
			
			if (null == $row['max']) return 0;
			else return $row['max'];											
		}
		
		public function getAccessPrivilege()
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPrivilege = $this->getDbTable()->info();
			$dbPrivilegeName = $dbPrivilege['name'];

			$moduleMapper = new Cloud_Model_Module_CloudModuleMapper();
			$dbModule = $moduleMapper->getDbTable()->info();
			$dbModuleName = $dbModule['name'];
			
			$privilegeTypeMapper = new Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper();
			$dbPrivilegeType= $privilegeTypeMapper->getDbTable()->info();
			$dbPrivilegeTypeName = $dbPrivilegeType['name'];				
				
			$select = $db->select()		                  
		                 ->from(array('p' => $dbPrivilegeName), array('id'))		     
		                 ->join(array('m' => $dbModuleName), 'p.module_id = m.id', array('name'))            
		                 ->join(array('pt' => $dbPrivilegeTypeName), 'p.pri_type_id = pt.id', array())
		                 ->where("pt.description = 'Access'");						                 
			    
           return $db->fetchAll($select);
		}
				
	}