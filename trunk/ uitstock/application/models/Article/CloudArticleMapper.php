<?php
	/**
	 * Class        : Article Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Article_CloudArticleMapper implements Cloud_Model_Article_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudArticle');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_Article_CloudArticle();			
			$entry->setId($row->id)	
			      ->setCat_id($row->cat_id)				      			      
				  ->setUser_id($row->user_id)
				  ->setRelative_id($row->relative_id)						  				  				  				 
				  ->setTitle($row->title)
				  ->setAlias($row->alias)
				  ->setSummarize($row->summarize)
				  ->setImage($row->image)
				  ->setContent($row->content)
				  ->setCreate_date($row->create_date)
				  ->setModify_date($row->modify_date)
				  ->setPublished($row->published)
				  ->setImportant($row->important)
				  ->setCount($row->count);				  
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
		
		public function save(Cloud_Model_Article_CloudArticle $article)
		{			
			$data = array(	
				'cat_id' => $article->getCat_id(),					    			  
				'user_id' => $article->getUser_id(),
				'relative_id' => $article->getRelative_id(),
			    'title' => $article->getTitle(),
			    'alias' => $article->getAlias(),
			    'summarize' => $article->getSummarize(),
				'image' => $article->getImage(),
			    'content' => $article->getContent(),
			    'create_date' => $article->getCreate_date(),
			    'modify_date' => $article->getModify_date(),			    
			    'published' => $article->getPublished(),			    															    							 
			    'important' => $article->getImportant(),
				'count' => $article->getCount(),
			);
			
			if (null == ($id = $article->getId())) {
				unset($data['id']);
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}				
		
		public function find($id, Cloud_Model_Article_CloudArticle $article)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$article->setId($row->id)		
				 	->setCat_id($row->cat_id)				      			      
				    ->setUser_id($row->user_id)
				    ->setRelative_id($row->relative_id)						  				  				  				 
				    ->setTitle($row->title)
				    ->setAlias($row->alias)
				    ->setSummarize($row->summarize)
				    ->setImage($row->image)
				    ->setContent($row->content)
				    ->setCreate_date($row->create_date)
				    ->setModify_date($row->modify_date)
				    ->setPublished($row->published)
				    ->setImportant($row->important)
				    ->setCount($row->count);								    	 				 	 			 				      		   
		}	

		public function fetchArticleByPage($page)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbArticle = $this->getDbTable()->info();
			$dbArticleName = $dbArticle['name'];
					
			$categoryMapper = new Cloud_Model_ContentCategory_CloudContentCategoryMapper();
			$dbCategory= $categoryMapper->getDbTable()->info();
			$dbCategoryName = $dbCategory['name'];
				
			$select = $db->select()		                  
		                 ->from(array('a' => $dbArticleName))
		                 ->join(array('c' => $dbCategoryName), 'a.cat_id = c.id', array('name as cat_name'))
		                 ->order('a.create_date desc');		               		        	             
			    
           $rows = $db->fetchAll($select);           
           
           $paginator = Zend_Paginator::factory($rows);
    	   $paginator->setItemCountPerPage(5);
    	   $paginator->setCurrentPageNumber($page);           		
                     
           return $paginator;  
		}
		
		public function getArticleById($id)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbArticle = $this->getDbTable()->info();
			$dbArticleName = $dbArticle['name'];
					
			$categoryMapper = new Cloud_Model_ContentCategory_CloudContentCategoryMapper();
			$dbCategory= $categoryMapper->getDbTable()->info();
			$dbCategoryName = $dbCategory['name'];
				
			$select = $db->select()		                  
		                 ->from(array('a' => $dbArticleName))
		                 ->join(array('c' => $dbCategoryName), 'a.cat_id = c.id', array('name as cat_name'))
		                 ->where('a.id = ?', $id);		                               		        	             			                                  	
                   
           return $db->fetchRow($select);
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
            	$entry = new Cloud_Model_Article_CloudArticle();
            	$entry->setName($row->name);				             	 	            	       	      
                $entries[] = $entry;            	         
            }                     		
                   
            return $entries;            
		}
		
		public function searchArticle($name)
		{
			if (null == $name) exit();
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->where('name = ?', $name);			           
			    
            $rows = $db->fetchAll($select);                        		
                     
            return $this->getEntries($rows);          
		}
	}