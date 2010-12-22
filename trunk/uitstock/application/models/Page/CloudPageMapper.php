<?php
	/**
	 * Class        : Page Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Page_CloudPageMapper implements Cloud_Model_Page_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudPage');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_Page_CloudPage();			
			$entry->setId($row->id)
			      ->setComponent_id($row->component_id)
			      ->setTitle($row->title)
				  ->setName($row->name)
				  ->setPublished($row->published)
				  ->setOrdering($row->ordering)				 
				  ->setIs_home($row->is_home);
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
		
		public function save(Cloud_Model_Page_CloudPage $Page)
		{			
			$data = array(
			    'component_id' => $Page->getComponent_id(),
			    'title' => $Page->getTitle(),
				'name' => $Page->getName(),
				'published' => $Page->getPublished(),
				'ordering' => $Page->getOrdering(),				
			    'is_home' => $Page->getIs_home(),							 
			);
			
			if (null == ($id = $Page->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}
		
		public function updateComponentbyPage($componentId, $pageId)
		{
			$data = array('component_id' => $componentId);
			$where = array('id = ?', $pageId);
			$this->getDbTable()->update($data, $where);
		}
		
		
		public function find($id, Cloud_Model_Page_CloudPage $Page)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$Page->setId($row->id)
			     ->setComponent_id($row->component_id)
			     ->setTitle($row->title)
				 ->setName($row->name)
				 ->setPublished($row->published)	
				 ->setOrdering($row->ordering)			 
				 ->setIs_home($row->is_home); 		   
		}
		
		public function fetchAll()
		{										
			return $this->getDbTable()->fetchAll();	
		}	    
		
		public function savePage(Cloud_Model_Page_CloudPage $Page, $component_id)
		{		
			$id = $this->save($Page);			
			if ($Page->getIs_home() == 1)
			{
				$data = array('is_home' => 0);			
				$where = array('component_id = ?' => $component_id);
				$this->getDbTable()->update($data, $where);
				
				$data = array('is_home' => 1);			
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);
			}
		}				
		
		public function getPageByComponent($component_id)
		{
			if (null == $component_id) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('component_id = ?', $component_id)
			             ->order('ordering');			                               	
                     
            return $db->fetchAll($select);           
		}
		
		public function getPageByComponentListDyn($component_id)
		{
			if (null == $component_id) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('component_id = ?', $component_id)
			             ->order('ordering');			                        		
                     
            return $db->fetchAll($select);           
		}				  				
			   
		public function getPageByTitle($title, $component_id, $currentPage)
		{						
			if (null == $currentPage) $id = "";
			else $id = $currentPage->getId();
						
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('title = ?', $title)
			             ->where('component_id = ?',$component_id)
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
		}
			
		public function getPageByName($name, $component_id, $currentPage)
		{						
			if (null == $currentPage) $id = "";
			else $id = $currentPage->getId();
						
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('name = ?', $name)
			             ->where('component_id = ?',$component_id)
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
		}	
		
		public function getMinOrder()
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	
			
			$stmt = $db->query('SELECT min(ordering) as min from pages');
			$row = $stmt->fetch();
			
			if (null == $row['min']) return 0;
			else return $row['min'];				
		}	
		
		public function getMaxOrder()
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	
			
			$stmt = $db->query('SELECT max(ordering) as max from pages');
			$row = $stmt->fetch();
			
			if (null == $row['max']) return 0;
			else return $row['max'];											
		}

		public function deleteAll($listid)
		{
			for ($i = 0; $i < count($listid); $i++) {	
				$id = $listid[$i]; 						
				$page = new Cloud_Model_Page_CloudPage();		 		
				$this->find($id, $page);		
				if (null == $page) echo 'error';
				else if ($page->getIs_home() == '1') echo 'default';
				else {					
					$db = $this->getDbTable();					
					$where = $db->getAdapter()->quoteInto('id = ?', $id);
					$db->delete($where);
				}										
			}
		}
		    				
		public function autoSuggestionPage($title, $component_id)
		{
			if (null == $title) exit();	
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->from($db, array('title'))
			             ->where('title like ?', "%$title%")
			             ->where('component_id = ?', $component_id);			                                 		
                   
            return $db->fetchAll($select);            
		}	
		
		public function searchPage($title, $component_id)
		{
			if (null == $title) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('title = ?', $title)
			             ->where('component_id = ?', $component_id);			            
                     
            return $db->fetchAll($select);           
		}				
	}