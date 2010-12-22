<?php
	/**
	 * Class        : Module Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Module_CloudModuleMapper implements Cloud_Model_Module_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudModule');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_Module_CloudModule();			
			$entry->setId($row->id)
			      ->setName($row->name)
			      ->setDescription($row->description)				  
				  ->setPublished($row->published);				  				 				  
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
		
		public function save(Cloud_Model_Module_CloudModule $module)
		{			
			$data = array(			   
				'name' => $module->getName(),
				'description' => $module->getDescription(),
				'published' => $module->getPublished(),											    							 
			);
			
			if (null == ($id = $module->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}						
		
		public function find($id, Cloud_Model_Module_CloudModule $module)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$module->setId($row->id)
			       ->setName($row->name)
			       ->setDescription($row->description)				  
				   ->setPublished($row->published);		   
		}
		
		public function delete($id)
		{						
			$db = $this->getDbTable();					
			$where = $db->getAdapter()->quoteInto('id = ?', $id);
			$db->delete($where);				
		}	
		
		public function fetch() {
			return $this->getDbTable()->fetchAll();	
		}
		
		public function fetchAll($page)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbModule = $this->getDbTable()->info();
			$dbModuleName = $dbModule['name'];							
				
			$select = $db->select()		                  
		                 ->from("$dbModuleName");		                 		                 		               		        	             
			    
           $rows = $db->fetchAll($select);           
           
           $paginator = Zend_Paginator::factory($rows);
    	   $paginator->setItemCountPerPage(2);
    	   $paginator->setCurrentPageNumber($page);           		
                     
           return $paginator;  
		}
		
		public function getAll()
		{
			return $this->getDbTable()->fetchAll(); 
		}
		
		public function getModuleByName($name, $currentModule)
		{						
			if (null == $currentModule) $id = "";
			else $id = $currentModule->getId();
						
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('name = ?', $name)			          
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
		}				
	}