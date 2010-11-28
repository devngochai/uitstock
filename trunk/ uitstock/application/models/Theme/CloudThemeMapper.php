<?php
	/**
	 * Class        : Theme Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Theme_CloudThemeMapper
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
				$this->setDbTable('Cloud_Model_DbTable_CloudTheme');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_Theme_CloudTheme();			
			$entry->setId($row->id)
			      ->setComponent_id($row->component_id)
				  ->setName($row->name)
				  ->setPath($row->path)				 
				  ->setIs_default($row->is_default);
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
		
		public function save(Cloud_Model_Theme_CloudTheme $Theme)
		{			
			$data = array(
			    'component_id' => $Theme->getComponent_id(),
				'name' => $Theme->getName(),
				'path' => $Theme->getPath(),				
			    'is_default' => $Theme->getIs_default(),							 
			);
			
			if (null == ($id = $Theme->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}
		
		public function saveTheme(Cloud_Model_Theme_CloudTheme $theme, $component_id)
		{			
			$id = $this->save($theme);			
			if ($theme->getIs_default() == 1)
			{
				$data = array('is_default' => 0);			
				$where = array('component_id = ?' => $component_id);
				$this->getDbTable()->update($data, $where);
				
				$data = array('is_default' => 1);			
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);
			}
		}	
		
		public function find($id, Cloud_Model_Theme_CloudTheme $Theme)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$Theme->setId($row->id)
			         ->setComponent_id($row->component_id)
				     ->setName($row->name)
				     ->setPath($row->path)				 
				     ->setIs_default($row->is_default);				   
		}
		
		public function fetchAll()
		{
			$rows = $this->getDbTable()->fetchAll();							
			return $this->getEntries($rows);
		}	    
		
		public function getThemeByComponent($component_id)
		{
			if (null == $component_id) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('component_id = ?', $component_id);
			    
            $rows = $db->fetchAll($select);                        		
                     
            return $this->getEntries($rows);  
		}
		
	    public function searchTheme($name, $component_id)
		{
			if (null == $name) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name = ?', $name)
			             ->where('component_id = ?', $component_id);
			    
            $rows = $db->fetchAll($select);                        		
                     
            return $this->getEntries($rows);          
		}
			
		public function getThemeByName($name, $component_id, $currentTheme)
		{				
			if (null == $currentTheme) $id = "";
			else $id = $currentTheme->getId();
						
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('name = ?', $name)
			             ->where('component_id = ?',$component_id)
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $this->getEntry($row);
		}
	
	    public function getThemeByPath($path, $component_id, $currentTheme)
		{
			if (null == $currentTheme) $id = "";
			else $id = $currentTheme->getId();
			
			$db = $this->getDbTable();
			$select = $db->select()				               		        
			             ->where('path = ?', $path)
			             ->where('component_id = ?',$component_id)
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
				
			return $this->getEntry($row);
		}
		
	    public function getIsDefault($component_id)
		{
			$db = $this->getDbTable();
			$select = $db->select()			           
						 ->where('component_id = ?', $component_id);
            $row = $db->fetchRow($select);
            if (null == $row)
            	return null;

			return $this->getEntry($row)->getIs_Default();    
		}
		
		public function getThemeDefault($component_id)
		{
			$db = $this->getDbTable();
			$select = $db->select()
			             ->where('is_default = ?', 1)
						 ->where('component_id = ?', $component_id);
            $row = $db->fetchRow($select);
            if (null == $row)
            	return null;

			return $this->getEntry($row)->getPath();           	
		}	
		
		public function setDefaultTheme($id, $component_id, $count = null)
		{							
			$default1 = $this->getIsDefault($component_id);
			$default2 = ($default1 == 0) ? 1 : 0;												
			
			if ($count == 1) {
				$data = array('is_default' => $default2);			
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);																							
			} else {
				$data = array('is_default' => 0);			
				$where = array('component_id = ?' => $component_id);
				$this->getDbTable()->update($data, $where);
				
				$data = array('is_default' => 1);			
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);
			} 										
		}				
		
		public function autoSuggestionTheme($name, $component_id)
		{
			if (null == $name) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name like ?', "%$name%")
			             ->where('component_id = ?', $component_id);
			    
            $rows = $db->fetchAll($select);    
            $entries = array();
            foreach ($rows as $row) {
            	$entry = new Cloud_Model_Theme_CloudTheme(); 
            	$entry->setName($row->name);				             	 	            	       	      
                $entries[] = $entry;            	         
            }                     		
                   
            return $entries;            
		}		
	}