<?php
	/**
	 * Class        : Privilege Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Privilege_CloudPrivilege
	{
		protected $id;
		protected $module_id;
		protected $pri_type_id;
		protected $ordering;									
		
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
		 * @return the $module_id
		 */
		public function getModule_id() {
			return $this->module_id;
		}
	
			/**
		 * @return the $pri_type_id
		 */
		public function getPri_type_id() {
			return $this->pri_type_id;
		}
	
			/**
		 * @return the $ordering
		 */
		public function getOrdering() {
			return $this->ordering;
		}
	
			/**
		 * @param $id the $id to set
		 */
		public function setId($id) {
			$this->id = $id;
			return $this;
		}
	
			/**
		 * @param $module_id the $module_id to set
		 */
		public function setModule_id($module_id) {
			$this->module_id = $module_id;
			return $this;
		}
	
			/**
		 * @param $pri_type_id the $pri_type_id to set
		 */
		public function setPri_type_id($pri_type_id) {
			$this->pri_type_id = $pri_type_id;
			return $this;
		}
	
			/**
		 * @param $ordering the $ordering to set
		 */
		public function setOrdering($ordering) {
			$this->ordering = $ordering;
			return $this;
		}														
	}			