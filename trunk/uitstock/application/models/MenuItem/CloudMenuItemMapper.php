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
			      ->setPri_id($row->role_pri_id)
				  ->setName($row->name)				
				  ->setLink($row->link)
				  ->setOrdering($row->ordering)				 
				  ->setPublished($row->published)
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
		
		public function save(Cloud_Model_MenuItem_CloudMenuItem $menuItem)
		{			
			$data = array(
			    'parent_id' => $menuItem->getParent_id(),
			    'menu_cat_id' => $menuItem->getMenu_cat_id(),
			    'pri_id' => $menuItem->getPri_id(),
				'name' => $menuItem->getName(),				
				'link' => $menuItem->getLink(),
				'ordering' => $menuItem->getOrdering(),				
			    'published' => $menuItem->getPublished(),
				'is_home' => $menuItem->getIs_home(),							 
			);
									
			if (null == ($id = $menuItem->getId())) {
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				unset($data['parent_id']);
				unset($data['menu_cat_id']);
				unset($data['ordering']);
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}

		public function updateOrdering($id, $parent_id, $catId)
		{
			if ($parent_id == 0) $ordering = $this->getMaxOrder($catId) + 1;
			else $ordering = 0;
			$this->getDbTable()->update(array('ordering' => $ordering), 
										array('id = ?' => $id)
			); 
		}
		
		public function updateHome($id, $is_home, $catId)
		{
			if ($is_home == 1) {				
				$data = array('is_home' => 0);			
				$where = array('menu_cat_id = ?' => $catId);
				$this->getDbTable()->update($data, $where);
				
				$data = array('is_home' => 1);			
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);			
			} else {
				$data = array('is_home' => 0);			
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);					
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
			      	 ->setPri_id($row->pri_id)
				  	 ->setName($row->name)				  	
				  	 ->setLink($row->link)
				  	 ->setOrdering($row->ordering)				 
				  	 ->setPublished($row->published)
				  	 ->setIs_home($row->is_home);		   
		}	
		
		public function getItemByCat($id)
		{			
			$db = $this->getDbTable();			
			$select = $db->select()			             
			             ->where('menu_cat_id = ?' , $id)
			             ->order('ordering');			             			                              	
                     
           return $db->fetchAll($select);   
		}

		public function fetchAllParent($id)
		{			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('parent_id = 0')
			             ->where('menu_cat_id = ?' , $id)
			             ->order('ordering');			             			                              	
                     
           return $db->fetchAll($select);   
		}
		
		public function fetchAllSub($id)
		{
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('parent_id != 0')
			             ->where('menu_cat_id = ?' , $id)
			             ->order('ordering');		             			                                 	
                     
           return $db->fetchAll($select);  
		}
		
		public function getMinOrder($id)
		{					
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	
			
			$stmt = $db->query("SELECT min(ordering) as min from menu_items
			                    WHERE menu_cat_id = $id and parent_id = 0");
			$row = $stmt->fetch();
			
			if (null == $row['min']) return 0;
			else return $row['min'];							
		}				
		
		public function getMaxOrder($id)
		{			
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	
			
			$stmt = $db->query("SELECT max(ordering) as max from menu_items
			                    WHERE menu_cat_id = $id and parent_id = 0");
			$row = $stmt->fetch();
			
			if (null == $row['max']) return 0;
			else return $row['max'];
		}	
		
		public function getIdByOrdering($catId, $ordering)
		{							
			$db = $this->getDbTable();			
		   	$select = $db->select()		                  
		                 ->from($db, array('id'))
		                 ->where('parent_id = 0')
		                 ->where('menu_cat_id = ?', $catId)		                 
		                 ->where('ordering = ?', $ordering);                 
		     		          				                 		                         																				
			return $db->fetchRow($select);															
		}	
		
		public function getItemByCategory($id)
		{
			$db = $this->getDbTable();			
			$select = $db->select()
						 ->from($db, array('id', 'name'))
			             ->where('parent_id = 0')
			             ->where('menu_cat_id = ?' , $id);			             			                                 	
                     
           return $db->fetchAll($select); 
		}
		
		public function checkOrder($id, $catId, $type, $ordering)
		{			
			$db = $this->getDbTable();
						
			$select = $db->select()
			               ->from($db, 'ordering')
			               ->where('id = ?', $id);

			$rs = $db->fetchRow($select);
			
			if (null == $rs) return 'Not Found';
			$maxOrder = $this->getMaxOrder($catId);
			$minOrder = $this->getMinOrder($catId);		
			if ($maxOrder == $minOrder) return 'Nothing';				
			if ($type == 'up' && $ordering > $minOrder) {
				return 'ok';
			}
			if ($type == 'down' && $ordering < $maxOrder) {
				return 'ok';
			}							
		}
		
		public function changeOrder($id, $catId, $type, $ordering)
		{	
			$flag = $this->checkOrder($id, $catId, $type, $ordering);		
			
			if ( $flag == 'ok') {
				if ($type == 'up') $orderingNew = $ordering - 1;					
				else if ($type == 'down') $orderingNew = $ordering + 1;																
			} else if ($flag == 'Nothing') {
				echo 'Nothing'; exit();
			} else {
				echo 'Not Found'; exit();
			}	
						
			$item = $this->getIdByOrdering($catId, $orderingNew);								
							
			$data = array('ordering' => $ordering);
			$where = array('id = ?' => $item->id);
			$this->getDbTable()->update($data, $where);
			
			$data = array('ordering' => $orderingNew);
			$where = array('id = ?' => $id);
			$this->getDbTable()->update($data, $where);
			
		}
	}