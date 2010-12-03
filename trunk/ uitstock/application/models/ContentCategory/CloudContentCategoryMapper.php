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
			if ($row == null)
				return null;
																      				 			      		
			return $this->getEntry($row);
		}
		
		public function updateAlias($id, $name)
		{
			$alias = $this->stripUnicode($name);
            $alias = preg_replace(array('/\s+/', '/[^A-Za-z0-9-]/', '/^[-]/', '/-$/'),
                                array('-', '','',''), strtolower($alias));     

			$data = array('alias' => $alias);
			$where = array('id = ?' => $id);
			$this->getDbTable()->update($data, $where);                                
		}
		
		public function stripUnicode($str)
        {
            if (!$str) return false;
            $unicode = array(
             'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
             'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
             'd'=>'đ',
             'D'=>'Đ',
        	  'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        	  'i'=>'í|ì|ỉ|ĩ|ị',	  
        	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
             'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
             'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
             'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
             'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
           );
           foreach ($unicode as $khongdau => $codau)
           {
                $arr = explode("|", $codau);
                $str = str_replace($arr, $khongdau, $str);
           }
           return $str;
        }      

		public function setPublishAction($listid)
		{
			for ($i = 0; $i < count($listid); $i++) {
				$id = $listid[$i]; 
				$data = array('published' => 1);
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);
			}
		}
		
	    public function setUnPublish($listid)
		{
			for ($i = 0; $i < count($listid); $i++) {						
				$id = $listid[$i]; 				
				$data = array('published' => 0);
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);
			}
		}
		
		public function setPublishCatAjax($id)
		{
				$db = $this->getDbTable();
				$select = $db->select()			    
				             ->from($db, 'published')            	
				             ->where('id = ?', $id);				          
				$row = $db->fetchRow($select);																	
																	      				 			      		
				$publish = ($row->published == 1) ? 0 : 1;
							
				$data = array('published' => $publish);
				$where = array('id = ?' => $id);
				$this->getDbTable()->update($data, $where);
				echo "AnHien_$publish.png";
		}
		
		public function autoSuggestionCat($name)
		{
			if (null == $name) exit();	
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name like ?', "%$name%")
			             ->limit(5, 0);			          
			    
            $rows = $db->fetchAll($select);    
            $entries = array();
            foreach ($rows as $row) {
            	$entry = new Cloud_Model_ContentCategory_CloudContentCategory();
            	$entry->setName($row->name);				             	 	            	       	      
                $entries[] = $entry;            	         
            }                     		
                   
            return $entries;            
		}
		
		public function searchCat($name)
		{
			if (null == $name) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name = ?', $name);			           
			    
            $rows = $db->fetchAll($select);                        		
                     
            return $this->getEntries($rows);          
		}
	}