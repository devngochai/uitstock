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

		public function delete($id)
		{
			$currentCategory = new Cloud_Model_ContentCategory_CloudContentCategory();
			$this->find($id, $currentCategory);
			
			$parentId =  $currentCategory->getParent_id();
			
			if ($parentId == 0) {
				$db = $this->getDbTable();					
				$where = $db->getAdapter()->quoteInto('parent_id = ?', $id);
				$db->delete($where);
												
				$where = $db->getAdapter()->quoteInto('id = ?', $id);
				$db->delete($where);
			} else {
				$db = $this->getDbTable();					
				$where = $db->getAdapter()->quoteInto('id = ?', $id);
				$db->delete($where);
			}
		}
		
		public function updateAlias($id, $name)
		{
			$alias = Cloud_Model_Utli_CloudUtli::stripUnicode($name);
            $alias = preg_replace(array('/\s+/', '/[^A-Za-z0-9-]/', '/^[-]/', '/-$/'),
                                array('-', '','',''), strtolower($alias));     

			$data = array('alias' => $alias);
			$where = array('id = ?' => $id);
			$this->getDbTable()->update($data, $where);                                
		}		
		
		public function fetchParentByPage($page)
		{
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('parent_id = 0');			             
			    
           $rows = $db->fetchAll($select);           
           
           $paginator = Zend_Paginator::factory($rows);
    	   $paginator->setItemCountPerPage(2);
    	   $paginator->setCurrentPageNumber($page);           		
                     
            return $paginator;  
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
		
		public function getContentCategoryByName($name, $currentContentCategory)
		{						
			if (null == $currentContentCategory) $id = "";
			else $id = $currentContentCategory->getId();
						
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('name = ?', $name)			            
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if (null == $row)
				return null;
																      				 			      		
			return $this->getEntry($row);
		}
		
		public function getSubNameById($parentId)
		{
			if ($parentId == 0) return "No";
			else {
				$db = $this->getDbTable();
				$select = $db->select()							
							 ->where('id = ?', $parentId);
				$row = $db->fetchRow($select);
				if (null == $row)
					return null;	

				return $this->getEntry($row);	
			}
		}		

		public function getNewsParent()
		{
			$db = $this->getDbTable();			
			$select = $db->select()
						 ->from($db, array('id', 'name'))
			             ->where('description =  ?', "Tin tức")
			             ->where('parent_id = 0')
			             ->where('published = 1');			          			                               		
                   
            return $db->fetchAll($select);       
		}
		
		public function getNewsSub($id)
		{
			$db = $this->getDbTable();			
			$select = $db->select()
						 ->from($db, array('name'))			           
			             ->where('parent_id = ?', $id)
			             ->where('published = 1');			          			                               		
                   
            return $db->fetchAll($select);       
		}				
		
		public function autoSuggestionCat($name)
		{
			if (null == $name) exit();	
			
			$db = $this->getDbTable();			
			$select = $db->select()
						 ->from($db, array('name'))
			             ->where('name like ?', "%$name%")
			             ->limit(5, 0);			          			                               		
                   
            return $db->fetchAll($select);            
		}
		
		public function searchCat($name)
		{
			if (null == $name) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name = ?', $name);			             
			    
           	$rows = $db->fetchAll($select);           
           
           	$paginator = Zend_Paginator::factory($rows);
    	   	$paginator->setItemCountPerPage(2);
    	   	$paginator->setCurrentPageNumber($page);           		
                     
	        return $paginator; 					       
		}
	}