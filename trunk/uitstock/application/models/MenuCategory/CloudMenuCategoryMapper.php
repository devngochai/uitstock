<?php
	/**
	 * Class        : Menu Category Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_MenuCategory_CloudMenuCategoryMapper implements Cloud_Model_MenuCategory_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudMenuCategory');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_MenuCategory_CloudMenuCategory();			
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
		
		public function save(Cloud_Model_MenuCategory_CloudMenuCategory $menuCategory)
		{			
			$data = array(			    			  
				'name' => $menuCategory->getName(),
				'description' => $menuCategory->getDescription(),															    							 
			);
			
			if (null == ($id = $menuCategory->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}				
		
		public function find($id, Cloud_Model_MenuCategory_CloudMenuCategory  $menuCategory)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$menuCategory->setId($row->id)		
				 	 	 ->setName($row->name)
				 	 	 ->setDescription($row->description);					 	 				 	 			 				      		   
		}	

		public function fetchAll()
		{										
			return $this->getDbTable()->fetchAll();	
		}		
		
		public function getMenuCategoryByName($name, $currentMenutCategory)
		{						
			if (null == $currentMenutCategory) $id = "";
			else $id = $currentMenutCategory->getId();
						
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('name = ?', $name)			            
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if (null == $row)
				return null;
																      				 			      		
			return $row;
		}		
	}