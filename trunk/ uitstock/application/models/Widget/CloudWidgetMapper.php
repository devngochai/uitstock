<?php
	/**
	 * Class        : Widget Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Widget_CloudWidgetMapper
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
				$this->setDbTable('Cloud_Model_DbTable_CloudWidget');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_Widget_CloudWidget();			
			$entry->setId($row->id)						    
				  ->setName($row->name)
				  ->setAlias($row->alias)
				  ->setPath($row->path);				  
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
		
		public function save(Cloud_Model_Widget_CloudWidget $Widget)
		{			
			$data = array(			   			   
				'name' => $Widget->getName(),
			    'alias' => $Widget->getAlias(),
			    'path' => $Widget->getPath,			    						 
			);
			
			if (null == ($id = $Widget->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}
		
		public function saveAll()
		{			
			$path = $_POST['path'];			
			$path = str_replace("\\\\\\\\", "\\", $path);
			
			$data = array(			   			   
				'name' => $_POST['name'],
			    'alias' => $_POST['alias'],
			    'path' => $path,			  					 
			);			
			$db = $this->getDbTable();
			$db->insert($data);		
			return $db->getAdapter()->lastInsertId();
		}
		
		public function updateAll()
		{			
			$path = $_POST['path'];		
			$id = $_POST['widgetId'];				
			$path = str_replace("\\\\\\\\", "\\", $path);
			
			$data = array(			   			   
				'name' => $_POST['name'],
			    'alias' => $_POST['alias'],
			    'path' => $path,			  					 
			);
														
			$this->getDbTable()->update($data, array('id = ?' => $id));	
		}
		
		public function find($id, Cloud_Model_Widget_CloudWidget $Widget)
		{
			$result = $this->getDbTable()->find($id);
			
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			
			$Widget->setId($row->id)				         
				   ->setName($row->name)
				   ->setAlias($row->alias)
				   ->setPath($row->path);				    
		}
		
		public function fetchAll()
		{
			$rows = $this->getDbTable()->fetchAll();							
			return $this->getEntries($rows);
		}			

		public function getWidgetbyPage($pageId)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbWidget = $this->getDbTable()->info();
			$dbWidgetName = $dbWidget['name'];
					
			$PageWidgetMapper = new Cloud_Model_PageWidget_CloudPageWidgetMapper();
			$dbPageWidget= $PageWidgetMapper->getDbTable()->info();
			$dbPageWidgetName = $dbPageWidget['name'];
								
			$select = $db->select()		                  
		                 ->from(array('w' => $dbWidgetName), array('name', 'alias', 'path'))
		                 ->join(array('pw' => $dbPageWidgetName), 'w.id = pw.widget_id')
		                 ->where('pw.page_id = ?',$pageId)	                 
		                 //->where("pw.position in (select position from $dbPageWidgetName group by position");		                 			                 		         
		                 ->order('pw.position', 'pw.ordering');
		                          		                 		                 				                 		                         						
			return $db->fetchAll($select);								   
		}	

		public function getWidgetbyComponentPage($componentId, $pageName)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbWidget = $this->getDbTable()->info();
			$dbWidgetName = $dbWidget['name'];
					
			$PageWidgetMapper = new Cloud_Model_PageWidget_CloudPageWidgetMapper();
			$dbPageWidget= $PageWidgetMapper->getDbTable()->info();
			$dbPageWidgetName = $dbPageWidget['name'];
			
			$PageMapper = new Cloud_Model_Page_CloudPageMapper();
			$dbPage= $PageMapper->getDbTable()->info();
			$dbPageName = $dbPage['name'];
								
			$select = $db->select()		                  
		                 ->from(array('w' => $dbWidgetName), array('path'))
		                 ->join(array('pw' => $dbPageWidgetName), 'w.id = pw.widget_id', array('position'))
		                 ->join(array('p' => $dbPageName), 'pw.page_id = p.id', array('name'))
		                 ->where('p.name = ?', $pageName)		                 		          
		                 ->where('p.component_id = ?', $componentId)       		                 			                 		         
		                 ->order('pw.ordering');
		                          		                 		                 				                 		                         						
			return $db->fetchAll($select);								   
		}	

		public function checkUniqueWidgetName($componentId, $listPageId, $name, $widgetId = null)
		{			
			$widgetId = ($widgetId == null) ? '' : $widgetId;
			$pageArray = explode(',', $listPageId);
			
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbWidget = $this->getDbTable()->info();
			$dbWidgetName = $dbWidget['name'];
					
			$PageWidgetMapper = new Cloud_Model_PageWidget_CloudPageWidgetMapper();
			$dbPageWidget= $PageWidgetMapper->getDbTable()->info();
			$dbPageWidgetName = $dbPageWidget['name'];
			
			$PageMapper = new Cloud_Model_Page_CloudPageMapper();
			$dbPage= $PageMapper->getDbTable()->info();
			$dbPageName = $dbPage['name'];
			
			$listName = array();
			for ($i = 0; $i < count($pageArray); $i++) {
				$pageId = $pageArray[$i];
				$select = $db->select()				
			             ->from(array('w' => $dbWidgetName), array('id'))
			             ->join(array('pw' => $dbPageWidgetName), 'w.id = pw.widget_id', array())
			             ->join(array('p' => $dbPageName), 'pw.page_id = p.id', array('title'))
			             ->where('w.id != ?', $widgetId)
			             ->where('w.name = ?', $name)
			             ->where('p.component_id = ?', $componentId)
			             ->where('pw.page_id = ?', $pageId);
			    
			    $rs =  $db->fetchRow($select);
			    			    
			    if ($rs['title'] != null) {			    	
			    	array_push($listName, $rs['title']);
			    }    	     
			}
						          			   	             
		   return $listName;		             
		}
		
		public function checkUniqueWidgetAlias($componentId, $pageId, $alias, $widgetId = null)
		{
			$widgetId = ($widgetId == null) ? '' : $widgetId;
			
			$pageArray = explode(',', $pageId);
			
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbWidget = $this->getDbTable()->info();
			$dbWidgetName = $dbWidget['name'];
					
			$PageWidgetMapper = new Cloud_Model_PageWidget_CloudPageWidgetMapper();
			$dbPageWidget= $PageWidgetMapper->getDbTable()->info();
			$dbPageWidgetName = $dbPageWidget['name'];
			
			$PageMapper = new Cloud_Model_Page_CloudPageMapper();
			$dbPage= $PageMapper->getDbTable()->info();
			$dbPageName = $dbPage['name'];
			
			$listAlias = array();
			for ($i = 0; $i < count($pageArray); $i++) {
				$pageId = $pageArray[$i];
				$select = $db->select()				
				             ->from(array('w' => $dbWidgetName), array('id'))
				             ->join(array('pw' => $dbPageWidgetName), 'w.id = pw.widget_id', array())
				             ->join(array('p' => $dbPageName), 'pw.page_id = p.id', array('title'))
				             ->where('w.id != ?', $widgetId)
				             ->where('w.alias = ?', $alias)
				             ->where('p.component_id = ?', $componentId)
				             ->where('pw.page_id = ?', $pageId);
				             
				$rs =  $db->fetchRow($select);
			    			    
			    if ($rs['title'] != null) {			    	
			    	array_push($listAlias, $rs['title']);
			    }    	     
			}
					          			   	             
		   return $listAlias;			             
		}
		
		public function getWidgetbyPageWidget($id)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbWidget = $this->getDbTable()->info();
			$dbWidgetName = $dbWidget['name'];
					
			$PageWidgetMapper = new Cloud_Model_PageWidget_CloudPageWidgetMapper();
			$dbPageWidget= $PageWidgetMapper->getDbTable()->info();
			$dbPageWidgetName = $dbPageWidget['name'];
			
			$PageMapper = new Cloud_Model_Page_CloudPageMapper();
			$dbPage= $PageMapper->getDbTable()->info();
			$dbPageName = $dbPage['name'];
								
			$select = $db->select()		                  
		                 ->from(array('w' => $dbWidgetName), array('name', 'alias','path'))
		                 ->join(array('pw' => $dbPageWidgetName), 'w.id = pw.widget_id')
		                 ->join(array('p' => $dbPageName), 'pw.page_id = p.id', array('component_id'))
		                 ->where('pw.id = ?',$id);			                 		        		                 
		                          		                 		                 				                 		                         						
			return $db->fetchRow($select);	
		}
		
		public function getWidgetByName($name, $widgetId)
		{																								
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('name = ?', $name)			             
			             ->where('id != ?', $widgetId);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $this->getEntry($row);
		}	

		public function autoSuggestionWidget($alias)
		{
			if (null == $alias) exit();	
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('alias like ?', "%$alias%");			             
			    
            $rows = $db->fetchAll($select);    
            $entries = array();
            foreach ($rows as $row) {
            	$entry = new Cloud_Model_Widget_CloudWidget(); 
            	$entry->setAlias($row->alias);				             	 	            	       	      
                $entries[] = $entry;            	         
            }                     		
                   
            return $entries;            
		}	
		
		public function searchWidget($alias, $pageId)
		{
			if (null == $alias) exit();
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbWidget = $this->getDbTable()->info();
			$dbWidgetName = $dbWidget['name'];
					
			$PageWidgetMapper = new Cloud_Model_PageWidget_CloudPageWidgetMapper();
			$dbPageWidget= $PageWidgetMapper->getDbTable()->info();
			$dbPageWidgetName = $dbPageWidget['name'];
								
			$select = $db->select()		                  
		                 ->from(array('w' => $dbWidgetName), array('name', 'alias'))
		                 ->join(array('pw' => $dbPageWidgetName), 'w.id = pw.widget_id')
		                 ->where('w.alias = ?' , $alias)
		                 ->where('pw.page_id = ?',$pageId);		                 
		                 //->where("pw.position in (select position from $dbPageWidgetName group by position");		                 			                 		         
		                 //->order('pw.ordering');
		                          		                 		                 				                 		                         						
			return $db->fetchAll($select);								     
		}							
	}