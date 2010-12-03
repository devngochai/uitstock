<?php
	/**
	 * Class        : Content Category Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_ContentCategory_CloudContentCategoryMapper implements Cloud_Model_ContentCategory_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudContentCategory');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_ContentCategory_CloudContentCategory();			
			$entry->setId($row->id)	
			      ->setParent_id($row->parent_id)				      			      
				  ->setName($row->name)
				  ->setAlias($row->alias)						  				  				  				 
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
		
		public function save(Cloud_Model_ContentCategory_CloudContentCategory $contentCategory)
		{			
			$data = array(	
				'parent_id' => $contentCategory->getParent_id(),					    			  
				'name' => $contentCategory->getName(),
			    'alias' => $contentCategory->getAlias(),
				'description' => $contentCategory->getDescription(),
			    'published' => $contentCategory->getPublished(),			    															    							 
			);
			
			if (null == ($id = $contentCategory->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}				
		
		public function find($id, Cloud_Model_ContentCategory_CloudContentCategory  $contentCategory)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$contentCategory->setId($row->id)		
				 	 	    ->setParent_id($row->parent_id)				      			      
						    ->setName($row->name)
						    ->setAlias($row->alias)						  				  				  				 
						    ->setDescription($row->description)
						    ->setPublished($row->published);						    	 				 	 			 				      		   
		}		

		public function fetchAllParent()
		{
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('parent_id = 0');			             
			    
           $rows = $db->fetchAll($select);                        		
                     
            return $this->getEntries($rows);  
		}
		
		public function fetchAllSub()
		{
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('parent_id != 0');			             
			    
            $rows = $db->fetchAll($select);                        		
                     
           return $this->getEntries($rows);  
		}
	}