<?php
	/**
	 * Class        : User Mapper
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_User_CloudUserMapper implements Cloud_Model_User_Interface
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
				$this->setDbTable('Cloud_Model_DbTable_CloudUser');
			}
			return $this->_dbTable;
		}
		
	    public function getEntry($row)
		{
			$entry = new Cloud_Model_User_CloudUser();			
			$entry->setId($row->id)
			      ->setRole_id($row->role_id)
			      ->setFull_name($row->full_name)
			      ->setGender($row->gender)
			      ->setBirthday($row->birthday)
			      ->setEmail($row->email)	
			      ->setMobile($row->mobile)
			      ->setAddress($row->address)
			      ->setAvatar($row->avatar)
			      ->setPassword($row->password)			      			      
			      ->setIs_enable($row->is_enable);
			      				 				  
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
		
		public function uploadAvatar($avatar, $email)
		{									
			$path = 'files/avatar/user/' . $avatar;
			$folder = 'files/avatar/user/' . $email;
			if (!is_dir($folder)) mkdir($folder);			
																		
			$ext = substr($avatar, strrpos($avatar, '.'));
			$fileName = Zend_Date::now()->toString('yyyyMMddHHmmss');
			$file = $fileName . $ext;
			$oldPath = $path;
			$newPath = $folder . '/' . $file;
			rename($oldPath, $newPath);
			return $newPath;			
		}
		
		public function save(Cloud_Model_User_CloudUser $user)
		{		
			if (null != $user->getAvatar()) {
				$avatar = $this->uploadAvatar($user->getAvatar(), $user->getEmail());	
			}				

			if ($user->getBirthday() != '') {				
				$birthday =  Cloud_Model_Utli_CloudUtli::showDateDB($user->getBirthday()); 						
			}		
			
			if ($user->getPassword() != '') {
				$salt = md5($user->getEmail());
				$password = md5($user->getPassword());
			}			
			
			$data = array(			   
				'role_id' => $user->getRole_id(),
				'full_name' => $user->getFull_name(),
			    'gender' => $user->getGender(),
				'birthday' => $birthday,
			    'email' => $user->getEmail(),
				'mobile' => $user->getMobile(),
			    'address' => $user->getAddress(),
			    'avatar' => $avatar,
			    'password' => md5($password . $salt),										    							 								
			    'is_enable' => $user->getIs_enable(),
			);
					
			if (null == ($id = $user->getId())) {			
				$db = $this->getDbTable();
				$db->insert($data);
				return $db->getAdapter()->lastInsertId();
			} else {
				unset($data['password']);
				if (null == $avatar) unset($data['avatar']);
				$this->getDbTable()->update($data, array('id = ?' => $id));		
			}
		}	
		
		public function updateAvatar($id, $email, $avatar)
		{
			$path = 'files/avatar/user/' . $email . '/' . $avatar; 			
			$data = array('avatar' => $path);
			$where = array('id = ?' => $id);
			$this->getDbTable()->update($data, $where);
			return $path;
		}
		
		public function updatePassword($id, $email, $password)
		{
			$salt = md5($email);
			$password = md5($password); 			
			$data = array('password' => md5($password . $salt));
			$where = array('id = ?' => $id);
			$this->getDbTable()->update($data, $where);
		}
		
		public function find($id, Cloud_Model_User_CloudUser $user)
		{
			$result = $this->getDbTable()->find($id);
			if (0 == count($result)) {
				return;
			}
			$row = $result->current();	
			$user->setId($row->id)
			     ->setRole_id($row->role_id)
			     ->setFull_name($row->full_name)
			     ->setGender($row->gender)
			     ->setBirthday($row->birthday)
			     ->setEmail($row->email)	
			     ->setMobile($row->mobile)
			     ->setAddress($row->address)
			     ->setAvatar($row->avatar)
			     ->setPassword($row->password)			      			      
			     ->setIs_enable($row->is_enable);	   
		}	
		
		public function searchUser($full_name)
		{
			if (null == $full_name) exit();			 
  
     		$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbUser = $this->getDbTable()->info();
			$dbUserName = $dbUser['name'];							
				
			$roleMapper = new Cloud_Model_Role_CloudRoleMapper();
			$dbRole = $roleMapper->getDbTable()->info();
			$dbRoleName = $dbRole['name'];					
				
			$select = $db->select()		                  
            		     ->from(array('u' => $dbUserName))		     
                 		 ->where('full_name = ?', $full_name);             		                 		                 		                 		                 		               		        	           
			    
            $rows = $db->fetchAll($select);           
           
            $paginator = Zend_Paginator::factory($rows);
    	    $paginator->setItemCountPerPage(6);
    	    $paginator->setCurrentPageNumber($page);           		
                     
            return $paginator;  
		}
		
	    public function findUserByEmail($email)
		{													
			$db = Zend_DB_table_Abstract::getDefaultAdapter();
			             
			$dbUser = $this->getDbTable()->info();
			$dbUserName = $dbUser['name'];							
				
			$roleMapper = new Cloud_Model_Role_CloudRoleMapper();
			$dbRole = $roleMapper->getDbTable()->info();
			$dbRoleName = $dbRole['name'];					
				
			$select = $db->select()		                  
		                 ->from(array('u' => $dbUserName))		     
		                 ->join(array('r' => $dbRoleName), 'u.role_id = r.id', array('name as role_name'))
		                 ->where('email = ?', $email);;         			             
			             			             			             
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
		}	
		
		public function deleteAll($listid)
		{
			for ($i = 0; $i < count($listid); $i++) {	
				$id = $listid[$i]; 						
				$user = new Cloud_Model_User_CloudUser();		 		
				$this->find($id, $user);		
				if (null == $user) echo 'error';			
				else {					
					$db = $this->getDbTable();					
					$where = $db->getAdapter()->quoteInto('id = ?', $id);
					$db->delete($where);
				}										
			}
		}
		
		public function fetchAll($page)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbUser = $this->getDbTable()->info();
			$dbUserName = $dbUser['name'];							
				
			$roleMapper = new Cloud_Model_Role_CloudRoleMapper();
			$dbRole = $roleMapper->getDbTable()->info();
			$dbRoleName = $dbRole['name'];					
				
			$select = $db->select()		                  
		                 ->from(array('u' => $dbUserName))		     
		                 ->join(array('r' => $dbRoleName), 'u.role_id = r.id', array('id as module_id', 'name as role_name'));            		                 		                 		                 		                 		               		        	           
			    
           $rows = $db->fetchAll($select);           
           
           $paginator = Zend_Paginator::factory($rows);
    	   $paginator->setItemCountPerPage(6);
    	   $paginator->setCurrentPageNumber($page);           		
                     
           return $paginator;  
		}	
		
		public function fetchUserById($listId, $page)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbUser = $this->getDbTable()->info();
			$dbUserName = $dbUser['name'];															
				
			$select = $db->select()		                  
		                 ->from(array('u' => $dbUserName))		     
		        		 ->where("id in ($listId)");            		                 		                 		                 		                 		               		        	           
			    
           $rows = $db->fetchAll($select);           
           
           $paginator = Zend_Paginator::factory($rows);
    	   $paginator->setItemCountPerPage(6);
    	   $paginator->setCurrentPageNumber($page);           		
                     
           return $paginator;  
		}			

		public function getUserByEmail($email, $currentUser)
		{						
			if (null == $currentUser) $id = "";
			else $id = $currentUser->getId();
					
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('email = ?', $email)			             
			             ->where('id != ?', $id);
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
		}	
		
		public function getUserByPassword($password, $currentUser)
		{						
			if (null == $currentUser) $id = "";
			else $id = $currentUser->getId();
			
			$salt = md5($currentUser->getEmail());
			$password = md5($password); 			
				
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('password = ?', md5($password . $salt))
			             ->where('id = ?', $id);		
			             	             			             
			$row = $db->fetchRow($select);														
			if ($row == null)
				return null;
																      				 			      		
			return $row;
		}	
		
		public function getUserById($id)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbUser = $this->getDbTable()->info();
			$dbUserName = $dbUser['name'];							
				
			$roleMapper = new Cloud_Model_Role_CloudRoleMapper();
			$dbRole = $roleMapper->getDbTable()->info();
			$dbRoleName = $dbRole['name'];					
				
			$select = $db->select()		                  
		                 ->from(array('u' => $dbUserName))		     
		                 ->join(array('r' => $dbRoleName), 'u.role_id = r.id', array('id as module_id', 'name as role_name'))
		                 ->where('u.id = ?', $id);            		                 		                 		                 		                 		               		        	           
			    
            return $db->fetchRow($select);
		}	
		
		public function getRolePrivilegeById($id)
		{
			$db = Zend_DB_table_Abstract::getDefaultAdapter();							
			
			$dbUser = $this->getDbTable()->info();
			$dbUserName = $dbUser['name'];							
				
			$roleMapper = new Cloud_Model_Role_CloudRoleMapper();
			$dbRole = $roleMapper->getDbTable()->info();
			$dbRoleName = $dbRole['name'];		

			$rolePrivilegeMapper = new Cloud_Model_RolePrivilege_CloudRolePrivilegeMapper();
			$dbRolePrivilege = $rolePrivilegeMapper->getDbTable()->info();
			$dbRolePrivilegeName = $dbRolePrivilege['name'];

			$privilegeMapper = new Cloud_Model_Privilege_CloudPrivilegeMapper();
			$dbPrivilege = $privilegeMapper->getDbTable()->info();
			$dbPrivilegeName = $dbPrivilege['name'];
			
			$privilegeTypeMapper = new Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper();
			$dbPrivilegeType = $privilegeTypeMapper->getDbTable()->info();
			$dbPrivilegeTypeName = $dbPrivilegeType['name'];						
			
			$select = $db->select()		                  
		                 ->from(array('u' => $dbUserName), array())		     
		                 ->join(array('r' => $dbRoleName), 'u.role_id = r.id', array())
		                 ->join(array('rp' => $dbRolePrivilegeName), 'rp.role_id = r.id', array())
		                 ->join(array('p' => $dbPrivilegeName), 'p.id = rp.pri_id', array('id'))
		                 ->join(array('pt' => $dbPrivilegeTypeName), 'pt.id = p.pri_type_id', array('description'))
		                 ->where('u.id = ?', $id);            		                 		                 		                 		                 		               		        	           
			    
            return $db->fetchAll($select);
		}

		public function isValidate($email, $password)
		{
			$db = $this->getDbTable();
			$select = $db->select()			                	
			             ->where('password = ?', $password)			             
			             ->where('email = ?', $email)
			             ->where('is_enable = 1');
			$row = $db->fetchRow($select);														
			if ($row == null)
				return false;
																      				 			      		
			return true;
		}
		
		public function autoSuggestion($full_name)
		{
			if (null == $full_name) exit();	
			
			$db = $this->getDbTable();			
			$select = $db->select()
			             ->from($db, array('full_name'))
			             ->where('full_name like ?', "%$full_name%");			             			                               
                   
            return $db->fetchAll($select);            
		}	
	}