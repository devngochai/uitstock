<?php
	/**
	 * Class        : Template Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Template_CloudTemplateMapper
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
				$this->setDbTable('Cloud_Model_DbTable_CloudTemplate');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_Template_CloudTemplate();			
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
		
		public function save(Cloud_Model_Template_CloudTemplate $template)
		{			
			$data = array(
			    'component_id' => $template->getComponent_id(),
				'name' => $template->getName(),
				'path' => $template->getPath(),				
			    'is_default' => $template->getIs_default(),							 
			);
			
			if (null == ($id = $template->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}
		
		public function find($id, Cloud_Model_Template_CloudTemplate $template)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$template->setId($row->id)
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
		
		public function saveTemplate(Cloud_Model_Template_CloudTemplate $template, $component_id)
		{		
			$id = $this->save($template);			
			if ($template->getIs_default() == 1)
			{
				$data = array('is_default' => 0);			
				$where = array('component_id = ?' => $component_id);
				$this->getDbTable()->update($data, $where);
				
				$data = array('is_default' => 1);			
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);
			}
		}
		
		public function getTemplateByComponent($component_id)
		{
			if (null == $component_id) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('component_id = ?', $component_id);
			    
            $rows = $db->fetchAll($select);                        		
                     
            return $this->getEntries($rows);  
		}
		
	    public function searchTemplate($name, $component_id)
		{
			if (null == $name) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name = ?', $name)
			             ->where('component_id = ?', $component_id);
			    
            $rows = $db->fetchAll($select);                        		
                     
            return $this->getEntries($rows);          
		}
			
		public function getTemplateByName($name, $component_id, $currentTemplate)
		{						
			if (null == $currentTemplate) $id = "";
			else $id = $currentTemplate->getId();
						
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
	
	    public function getTemplateByPath($path, $component_id, $currentTemplate)
		{
			if (null == $currentTemplate) $id = "";
			else $id = $currentTemplate->getId();
			
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
		
		public function getTemplateDefault($component_id)
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
		
		public function setDefaultTemplate($id, $component_id, $count = null)
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

	     public function setDefaultTemplateByName($values)
		{							
			$data = array('is_default' => '0');			
			$where = array('component_id = ?' => $values['component_id']);
			$this->getDbTable()->update($data, $where);	
										
			$data = array('is_default' => '1');			
			$where = array('name = ?' => $values['name']);
			$this->getDbTable()->update($data, $where);
		}
		
		public function autoSuggestionTemplate($name, $component_id)
		{
			if (null == $name) exit();	
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name like ?', "%$name%")
			             ->where('component_id = ?', $component_id);
			    
            $rows = $db->fetchAll($select);    
            $entries = array();
            foreach ($rows as $row) {
            	$entry = new Cloud_Model_Template_CloudTemplate(); 
            	$entry->setName($row->name);				             	 	            	       	      
                $entries[] = $entry;            	         
            }                     		
                   
            return $entries;            
		}		
	}