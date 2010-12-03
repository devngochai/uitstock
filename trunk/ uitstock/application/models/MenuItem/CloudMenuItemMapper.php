<?php
	/**
	 * Class        : Menu Item Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_MenuItem_CloudMenuItemMapper implements Cloud_Model_MenuItem_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudMenuItem');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_MenuItem_CloudMenuItem();			
			$entry->setId($row->id)
			      ->setParent_id($row->parent_id)
			      ->setMenu_cat_id($row->menu_cat_id)
			      ->setRole_pri_id($row->role_pri_id)
				  ->setName($row->name)
				  ->setAlias($row->alias)
				  ->setLink($row->link)
				  ->setOrdering($row->ordering)				 
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
		
		public function save(Cloud_Model_MenuItem_CloudMenuItem $menuItem)
		{			
			$data = array(
			    'parent_id' => $menuItem->getParent_id(),
			    'menu_cat_id' => $menuItem->getMenu_cat_id(),
			    'role_pri_id' => $menuItem->getRole_pri_id(),
				'name' => $menuItem->getName(),
				'alias' => $menuItem->getAlias(),
				'link' => $menuItem->getLink(),
				'ordering' => $menuItem->getOrdering(),				
			    'published' => $menuItem->getPublished(),							 
			);
			
			if (null == ($id = $menuItem->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}				
		
		public function find($id, Cloud_Model_MenuItem_CloudMenuItem  $menuItem)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$menuItem->setId($row->id)
			     	 ->setParent_id($row->parent_id)
			     	 ->setMenu_cat_id($row->menu_cat_id)
			     	 ->setRole_pri_id($row->role_pri_id)
				 	 ->setName($row->name)
				 	 ->setAlias($row->alias)	
				 	 ->setLink($row->link)
				 	 ->setOrdering($row->ordering)			 
				     ->setPublished($row->published); 		   
		}				    					
	}