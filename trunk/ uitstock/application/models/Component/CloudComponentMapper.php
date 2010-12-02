<?php
	/**
	 * Class        : Component Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Component_CloudComponentMapper implements Cloud_Model_Component_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudComponent');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{			
			$entry = new Cloud_Model_Component_CloudComponent();	
			$entry->setId($row->id)					
				  ->setName($row->name)	
				  ->setIs_admin($row->is_admin)			  
				  ->setOrdering($row->ordering);
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
		
		public function save(Cloud_Model_Component_CloudComponent $Component)
		{						
			$data = array(								
			    'name' => $Component->getName(),
			    'is_admin' => $Component->getIs_admin(),					   
			    'ordering' => $Component->getOrdering(),			 
			);
			
			if (null == ($id = $Component->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);						
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}
		
		public function find($id, Cloud_Model_Component_CloudComponent $Component)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$Component->setId($row->id)				   	
				      ->setName($row->name)	
				      ->setIs_admin($row->is_admin)			      
				      ->setOrdering($row->ordering);		   
		}
		
		public function findComponentDetail($id) 
		{					
			$db = Zend_DB_table_Abstract::getDefaultAdapter();

			$dbComponent = $this->getDbTable()->info();
			$dbComponent = $dbComponent['name'];
			
			$templateMapper = new Cloud_Model_DbTable_CloudTemplate();
			$templateMapper = $templateMapper->info();
			$dbTemplateName = $templateMapper['name'];
			
			$pageThemetMapper = new Cloud_Model_DbTable_CloudTheme();
			$dbTheme = $pageThemetMapper->info();
			$dbThemeName = $dbTheme['name'];
			
		    $select = $db->select()		                  
		                 ->from(array('c' => $dbComponent), array('id as component_id', 'name as component_name', 'ordering as component_order', 'is_admin'))
		                 ->join(array('t' => $dbTemplateName), 'c.id = t.component_id', array('id as template_id'))
		                 ->join(array('th' => $dbThemeName), 'c.id = th.component_id', array('id as theme_id'))
		                 ->where('t.is_default = 1')
		                 ->where('th.is_default = 1')		                 
		                 ->where('c.id = ?', $id);
		    
            return $db->fetchRow($select);	
		}
		
		public function fetchAll()
		{
			$rows = $this->getDbTable()->fetchAll();								
			return $this->getEntries($rows);
		}			
		
	    public function getAllComponent()
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	

			$dbComponent = $this->getDbTable()->info();
			$dbComponent = $dbComponent['name'];
			
			$templateMapper = new Cloud_Model_DbTable_CloudTemplate();
			$dbTemplate = $templateMapper->info();
			$dbTemplateName = $dbTemplate['name'];
			
			$ThemetMapper = new Cloud_Model_DbTable_CloudTheme();
			$dbTheme = $ThemetMapper->info();
			$dbThemeName = $dbTheme['name'];
			
		    $select = $db->select()		                  
		                 ->from(array('c' => $dbComponent), array('id', 'name as component_name'))
		                 ->join(array('t' => $dbTemplateName), 'c.id = t.component_id', array('name as template_name'))
		                 ->join(array('th' => $dbThemeName), 'c.id = th.component_id', array('name as theme_name'))
		                 ->where('t.is_default = 1')
		                 ->where('th.is_default = 1');		                 
		            
            return $db->fetchAll($select);			                     
		}
		
	    public function fetchAllByOrder()
		{
			$db = $this->getDbTable();			
			$select = $db->select()			             
			             ->order('ordering');
			$rows = $db->fetchAll($select);								
			return $this->getEntries($rows);
		}
		
	    public function fetchAllByFront()
		{
			$db = $this->getDbTable();			
			$select = $db->select()			     
						 ->where('is_admin = 0')        
			             ->order('ordering');
			$rows = $db->fetchAll($select);								
			return $this->getEntries($rows);
		}
		
	    public function getMaxOrder()
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	
			
			$stmt = $db->query('SELECT max(ordering) as max from components');
			$row = $stmt->fetch();
			
			if (null == $row['max']) return 0;
			else return $row['max'];	
		}
		
		public function getMinOrder()
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();	
			
			$stmt = $db->query('SELECT min(ordering) as min from components');
			$row = $stmt->fetch();
			
			if (null == $row['min']) return 0;
			else return $row['min'];		
		}	
										
		public function getComponentById($id)
		{
			if (null == $id) return null;
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('id = ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																					      				 			      	
			return $this->getEntry($row);
		}
			
		public function getComponentByName($name, $currentComponent)
		{				
			if (null == $currentComponent) $id = "";
			else $id = $currentComponent->getId();
						
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('name = ?', $name)
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $this->getEntry($row);
		}
	
			
		public function deleteComponent($id)
		{
			$where = $this->getDbTable()->getAdapter()->quoteInto('id = ?', $id);
			$this->getDbTable()->delete($where);
		}
		
		public function autoSuggestionComponent($name)
		{
			if (null == $name) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name like ?', "%$name%");
			    
            $rows = $db->fetchAll($select);    
            $entries = array();
            foreach ($rows as $row) {
            	$entry = new Cloud_Model_Component_CloudComponent(); 
            	$entry->setTemplate_id($row->template_id);				             	 	            	       	      
                $entries[] = $entry;            	         
            }                     		
                   
            return $entries;            
		}
		
		public function searchComponent($name)
		{
			if (null == $name) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name = ?', $name);
			    
            $rows = $db->fetchAll($select);                        		
                     
            return $this->getEntries($rows);          
		}
		
	}