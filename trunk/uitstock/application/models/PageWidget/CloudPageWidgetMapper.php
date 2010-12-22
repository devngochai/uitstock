<?php
	/**
	 * Class        : Page Page Widget Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_PageWidget_CloudPageWidgetMapper implements Cloud_Model_PageWidget_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudPageWidget');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_PageWidget_CloudPageWidget();			
			$entry->setId($row->id)	
			      ->setWidget_id($row->widget_id)
				  ->setPage_id($row->page_id)		    				 
				  ->setPosition($row->position)				 
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
		
		public function save(Cloud_Model_PageWidget_CloudPageWidget $PageWidget)
		{			
			$data = array(			   			    
			    'widget_id' => $PageWidget->getWidget_id(),
			    'page_id' => $PageWidget->getPage_id(),
			    'position' => $PageWidget->getPosition(),
			    'ordering' => $PageWidget->getOrdering(),
				'published' => $PageWidget->getPublished(),							 
			);
			
			if (null == ($id = $PageWidget->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}
		
		public function saveAll($widgetId)
		{			
			$db = $this->getDbTable();		
														
			$position = $_POST['position'];			
			$published = $_POST['published'];
			$ordering = (int) $_POST['ordering'];
			
			$listPageId = $_POST['listPageId'];
			$pageArray = explode(',', $listPageId);

			if (count($pageArray) == 1) {
				$pageId = $listPageId;
				$maxOrder = (int) $this->getMaxOrder($pageId, $position) + 1;
				
				if ($ordering != $maxOrder) {				
					$pagewidget = $this->getIdByPage($pageId, $position, $ordering);
							
					$data = array(
					     'ordering' => $maxOrder,
					);
					$this->getDbTable()->update($data, array('id = ?' => $pagewidget));
				} 		
											
				$data = array(			   
				    'widget_id' => $widgetId,
				    'page_id' => $pageId,							    
				    'position' => $position,
				    'ordering' => $ordering,
					'published' => $published,							 
				);	
				
				$db->insert($data);	
			} else {				
				for ($i = 0; $i < count($pageArray); $i++) {
					$pageId = $pageArray[$i];
					$maxOrder = (int) $this->getMaxOrder($pageId, $position) + 1;					
					
					$data = array(			   
					    'widget_id' => $widgetId,
					    'page_id' => $pageId,							    
					    'position' => $position,
					    'ordering' => $maxOrder,
						'published' => $published,							 
					);				
					
					$db->insert($data);	
				}
			}
		}
		
		public function updateAll()
		{									
			$db = $this->getDbTable();		

			$widgetId = $_POST['widgetId'];
			$position = $_POST['position'];		
			$positionCurrent = $_POST['positionCurrent'];
				
			$published = $_POST['published'];
			$ordering = (int) $_POST['ordering'];
			$orderingCurrent = (int) $_POST['orderingCurrent'];
			$pageWidgetId = $_POST['pageWidgetId'];
			$pageId = $_POST['pageId'];
									
			if ($position == $positionCurrent) {
				$pagewidget = $this->getIdByPage($pageId, $position, $ordering);
							
				$data = array(
				     'ordering' => $orderingCurrent,
				);			
					
				$this->getDbTable()->update($data, array('id = ?' => $pagewidget));
				
				$data = array(			   
				    'widget_id' => $widgetId,
				    'page_id' => $pageId,							    
				    'position' => $position,
				    'ordering' => $ordering,
					'published' => $published,							 
				);
									
				$this->getDbTable()->update($data, array('id = ?' => $pageWidgetId));
								
			} else {				
				$maxOrder = (int) $this->getMaxOrder($pageId, $position) + 1;
			
				if ($ordering != $maxOrder) {				
					$pagewidget = $this->getIdByPage($pageId, $position, $ordering);
							
					$data = array(
					     'ordering' => $maxOrder,
					);
					$this->getDbTable()->update($data, array('id = ?' => $pagewidget));
				} 		
											
				$data = array(			   
				    'widget_id' => $widgetId,
				    'page_id' => $pageId,							    
				    'position' => $position,
				    'ordering' => $ordering,
					'published' => $published,							 
				);	
				
				$this->getDbTable()->update($data, array('id = ?' => $pageWidgetId));
			}			
		}
		
		public function find($id, Cloud_Model_PageWidget_CloudPageWidget $PageWidget)
		{			
			$result = $this->getDbTable()->find($id);
		
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$PageWidget->setId($row->id)	
				       ->setWidget_id($row->widget_id)
				       ->setPage_id($row->page_id)		    				   
					   ->setPosition($row->position)				 
					   ->setOrdering($row->ordering)
					   ->setPublished($row->published);	   
		}
		
		public function fetchAll()
		{
			$rows = $this->getDbTable()->fetchAll();							
			return $this->getEntries($rows);
		}
				
		public function getPageWidgetbyPage($pageId)
		{
			if (null == $pageId) exit();					
            			
            $db = $this->getDbTable();	     										
            						
		    $select = $db->select()		                  		                              		                 		                
		                 ->where('page_id = ?', $pageId);		                 			                 
		            
            return $db->fetchAll($select);			   
		}				

		public function getOrderByPage($pageId, $position = null)
		{
			if (null == $position) $position = 'Header';
			
			$db = $this->getDbTable();			
		   	$select = $db->select()		                  
		                 ->from($db, array('ordering'))
		                 ->where('page_id = ?', $pageId)
		                 ->where('position = ?', $position)
		                 ->order('ordering');                 
		                 				                 		                         															
			$entries = $db->fetchAll($select);	
			$i = 0;					
			foreach ($entries as $entry) {
				$i++; 																		
				$array[$i] = $entry->ordering;				
			}												
				
			return $array;						
		}	

		public function getIdByPage($pageId, $position, $ordering)
		{
			if (null == $position) $position = 'Header';
				
			$db = $this->getDbTable();			
		   	$select = $db->select()		                  
		                 ->from($db, array('id'))
		                 ->where('page_id = ?', $pageId)
		                 ->where('position = ?', $position)
		                 ->where('ordering = ?', $ordering);                 
		     		          				                 		                         														
			$row = $db->fetchRow($select);			
			return $row->id;															
		}	

		public function getMinOrder($pageId,$position)
		{			
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	
			
			$stmt = $db->query("SELECT min(ordering) as min from page_widget
			                    WHERE page_id = $pageId and position = '$position'");
			$row = $stmt->fetch();
			
			if (null == $row['min']) return 0;
			else return $row['min'];							
		}				
		
		public function getMaxOrder($pageId, $position)
		{			
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	
			
			$stmt = $db->query("SELECT max(ordering) as max from page_widget
			                    WHERE page_id = $pageId and position = '$position'");
			$row = $stmt->fetch();
			
			if (null == $row['max']) return 0;
			else return $row['max'];
		}	
		
		public function deleteAll($listid)
		{
			$listid = explode(',', $listid);
			for ($i = 0; $i < count($listid); $i++) {	
				$id = $listid[$i]; 						
				$pageWidget = new Cloud_Model_PageWidget_CloudPageWidget();		 		
				$this->find($id, $pageWidget);		
				if (null == $pageWidget) echo 'error';				
				else {					
					$db = $this->getDbTable();					
					$where = $db->getAdapter()->quoteInto('id = ?', $id);
					$db->delete($where);
				}										
			}
		}
				
		public function checkOrder($type, $id, $pageId, $position, $ordering)
		{			
			$db = $this->getDbTable();
						
			$select = $db->select()
			               ->from($db, 'ordering')
			               ->where('id = ?', $id);

			$rs = $db->fetchRow($select);
			
			if (null == $rs) return 'Not Found';
			$maxOrder = $this->getMaxOrder($pageId, $position);
			$minOrder = $this->getMinOrder($pageId, $position);		
			if ($maxOrder == $minOrder) return 'Nothing';				
			if ($type == 'up' && $ordering > $minOrder) {
				return 'ok';
			}
			if ($type == 'down' && $ordering < $maxOrder) {
				return 'ok';
			}							
		}
		
		public function changeOrder($type, $id, $pageId, $position, $ordering)
		{	
			$flag = $this->checkOrder($type, $id, $pageId, $position, $ordering);		
			
			if ( $flag == 'ok') {
				if ($type == 'up') $orderingNew = $ordering - 1;					
				else if ($type == 'down') $orderingNew = $ordering + 1;																
			} else if ($flag == 'Nothing') {
				echo 'Nothing'; exit();
			} else {
				echo 'Not Found'; exit();
			}	

			$pagewidget = $this->getIdByPage($pageId, $position, $orderingNew);
					
			$data = array('ordering' => $ordering);
			$where = array('id = ?' => $pagewidget);
			$this->getDbTable()->update($data, $where);
			
			$data = array('ordering' => $orderingNew);
			$where = array('id = ?' => $id);
			$this->getDbTable()->update($data, $where);
			
		}
	}