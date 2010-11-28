<?php
	/**
	 * Class        : Theme Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Theme_CloudTheme
	{
		protected $id;
		protected $component_id;
		protected $name;	
		protected $path;		
		protected $is_default;	
		
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
		 * @return the $component_id
		 */
		public function getComponent_id() {
			return $this->component_id;
		}
	
			/**
		 * @return the $name
		 */
		public function getName() {
			return $this->name;
		}
	
			/**
		 * @return the $path
		 */
		public function getPath() {
			return $this->path;
		}
	
			/**
		 * @return the $is_default
		 */
		public function getIs_default() {
			return $this->is_default;
		}
	
			/**
		 * @param $id the $id to set
		 */
		public function setId($id) {
			$this->id = $id;
			return $this;
		}
	
			/**
		 * @param $component_id the $component_id to set
		 */
		public function setComponent_id($component_id) {
			$this->component_id = $component_id;
			return $this;
		}
	
			/**
		 * @param $name the $name to set
		 */
		public function setName($name) {
			$this->name = $name;
			return $this;
		}
	
			/**
		 * @param $path the $path to set
		 */
		public function setPath($path) {
			$this->path = $path;
			return $this;
		}
	
			/**
		 * @param $is_default the $is_default to set
		 */
		public function setIs_default($is_default) {
			$this->is_default = $is_default;
			return $this;
		}				
	}	
	
	