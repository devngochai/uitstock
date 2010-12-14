<?php
	/**
	 * Class        : PrivilegeType Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper implements Cloud_Model_PrivilegeType_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudPrivilegeType');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_PrivilegeType_CloudPrivilegeType();			
			$entry->setId($row->id)
			      ->setName($row->name)
			      ->setDescription($row->description)				  
				  ->setPublished($row->published)
				  ->setButton1($row->button1)
				  ->setButton2($row->button2);				  				 				  
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
		
		public function save(Cloud_Model_PrivilegeType_CloudPrivilegeType $privilegeType)
		{			
			$data = array(			   
				'name' => $privilegeType->getName(),
				'description' => $privilegeType->getDescription(),
				'published' => $privilegeType->getPublished(),	
				'button1' => $privilegeType->getButton1(),												    							 
			    'button2' => $privilegeType->getButton2(),
			);
			
			if (null == ($id = $privilegeType->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}						
		
		public function find($id, Cloud_Model_PrivilegeType_CloudPrivilegeType $privilegeType)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$privilegeType->setId($row->id)
			              ->setName($row->name)
			      		  ->setDescription($row->description)				  
				  		  ->setPublished($row->published)
				  		  ->setButton1($row->button1)
				  		  ->setButton2($row->button2);	   
		}
		
		public function delete($id)
		{						
			$db = $this->getDbTable();					
			$where = $db->getAdapter()->quoteInto('id = ?', $id);
			$db->delete($where);				
		}	
		
		public function fetchAll()
		{								
			return $this->getDbTable()->fetchAll(); 
		}
		
		public function getPrivilegeTypeByModule($moduleId)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPrivilegeType = $this->getDbTable()->info();
			$dbPrivilegeTypeName = $dbPrivilegeType['name'];			
			
			$privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
			$dbPrivilege= $privilegeMapper->getDbTable()->info();
			$dbPrivilegeName = $dbPrivilege['name'];					
				
			$select = $db->select()		                  
		                 ->from(array('p' => $dbPrivilegeName), array())		                 
		                 ->join(array('pt' => $dbPrivilegeTypeName), 'p.pri_type_id = pt.id', array('id', 'name'))
		                 ->where('p.module_id = ?', $moduleId)		               
		                 ->order('p.ordering asc');			           
			    
           return $db->fetchAll($select);   
		}
		
		public function getPrivilegeTypeByName($name, $currentPrivilegeType)
		{						
			if (null == $currentPrivilegeType) $id = "";
			else $id = $currentPrivilegeType->getId();
						
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('name = ?', $name)			          
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
		}	

		public function getShortcutById($id)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPrivilegeType = $this->getDbTable()->info();
			$dbPrivilegeTypeName = $dbPrivilegeType['name'];			
			
			$privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
			$dbPrivilege= $privilegeMapper->getDbTable()->info();
			$dbPrivilegeName = $dbPrivilege['name'];			
				
			$select = $db->select()		                  
		                 ->from(array('p' => $dbPrivilegeName), array())		                 
		                 ->join(array('pt' => $dbPrivilegeTypeName), 'p.pri_type_id = pt.id', array('button1'))
		                 ->where("p.id in ($id)")
		                 ->where("pt.description = 'access'");		               		           	           
			    
           return $db->fetchAll($select);
		}
		
		public function getButton1ById($id, $moduleId)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPrivilegeType = $this->getDbTable()->info();
			$dbPrivilegeTypeName = $dbPrivilegeType['name'];			
			
			$privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
			$dbPrivilege= $privilegeMapper->getDbTable()->info();
			$dbPrivilegeName = $dbPrivilege['name'];			
				
			$select = $db->select()		                  
		                 ->from(array('p' => $dbPrivilegeName), array())		                 
		                 ->join(array('pt' => $dbPrivilegeTypeName), 'p.pri_type_id = pt.id', array('button1'))
		                 ->where("p.id in ($id)")
		                 ->where('p.module_id = ?', $moduleId)
		                 ->where("pt.description != 'access'");		               		           	           
			    
           return $db->fetchAll($select);
		}
		
		public function getButton2ById($id, $moduleId)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbPrivilegeType = $this->getDbTable()->info();
			$dbPrivilegeTypeName = $dbPrivilegeType['name'];			
			
			$privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
			$dbPrivilege= $privilegeMapper->getDbTable()->info();
			$dbPrivilegeName = $dbPrivilege['name'];			
				
			$select = $db->select()		                  
		                 ->from(array('p' => $dbPrivilegeName), array())		                 
		                 ->join(array('pt' => $dbPrivilegeTypeName), 'p.pri_type_id = pt.id', array('button2'))
		                 ->where("p.id in ($id)")
		                 ->where('p.module_id = ?', $moduleId)
		                 ->where("pt.description != 'access'");		               		           	           
			    
           return $db->fetchAll($select);
		}
		
	}