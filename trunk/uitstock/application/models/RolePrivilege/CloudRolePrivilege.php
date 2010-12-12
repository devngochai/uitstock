<?php
	/**
	 * Class        : Role Privilege Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_RolePrivilege_CloudRolePrivilege
	{
		protected $id;				
		protected $role_id;	
		protected $pri_id;		
		
	public function __construct(array $options = null)
		{
			if (is_array($options)) {
				$this->setOptions($options);
			}
		}
	
		public function __set($name, $value)
		{
			$method = 'set' . $name;
			if (('mapper' == $name) || !method_exists($this, $method)) {
				throw new Exception('Invalid widget property');
			}
			$this->$method($value);
		}
		
		public function __get($name)
		{
			$method = 'get' . $name;
			if (('mapper' == $name) || !method_exists($this, $method)) {
				throw new Exception('Invalid widget property');
			}
			return $this->$method();	
		}
		
		public function setOptions(array $options)
		{
			$methods = get_class_methods($this);
			foreach ($options as $key => $value) {
				$method = 'set' . ucfirst($key);
				if (in_array($method, $methods)) {				 
					$this->$method($value);
				}
			}
			return $this;
		}
		
			/**
		 * @return the $id
		 */
		public function getId() {
			return $this->id;
		}
	
			/**
		 * @return the $role_id
		 */
		public function getRole_id() {
			return $this->role_id;
		}
	
			/**
		 * @return the $pri_id
		 */
		public function getPri_id() {
			return $this->pri_id;
		}
	
			/**
		 * @param $id the $id to set
		 */
		public function setId($id) {
			$this->id = $id;
			return $this;
		}
	
			/**
		 * @param $role_id the $role_id to set
		 */
		public function setRole_id($role_id) {
			$this->role_id = $role_id;
			return $this;
		}
	
			/**
		 * @param $pri_id the $pri_id to set
		 */
		public function setPri_id($pri_id) {
			$this->pri_id = $pri_id;
			return $this;
		}														
	}			