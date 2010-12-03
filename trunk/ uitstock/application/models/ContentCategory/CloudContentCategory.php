<?php
	/**
	 * Class        : Content Category Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_ContentCategory_CloudContentCategory
	{
		protected $id;		
		protected $parent_id;	
		protected $name;								
		protected $alias;
		protected $description;
		protected $published;		
		
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
		 * @return the $parent_id
		 */
		public function getParent_id() {
			return $this->parent_id;
		}
	
			/**
		 * @return the $name
		 */
		public function getName() {
			return $this->name;
		}
	
			/**
		 * @return the $alias
		 */
		public function getAlias() {
			return $this->alias;
		}
	
			/**
		 * @return the $description
		 */
		public function getDescription() {
			return $this->description;
		}
	
			/**
		 * @return the $published
		 */
		public function getPublished() {
			return $this->published;
		}
			
			/**
		 * @param $id the $id to set
		 */
		public function setId($id) {
			$this->id = $id;
			return $this;
		}
	
			/**
		 * @param $parent_id the $parent_id to set
		 */
		public function setParent_id($parent_id) {
			$this->parent_id = $parent_id;
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
		 * @param $alias the $alias to set
		 */
		public function setAlias($alias) {
			$this->alias = $alias;
			return $this;
		}
	
			/**
		 * @param $description the $description to set
		 */
		public function setDescription($description) {
			$this->description = $description;
			return $this;
		}
	
			/**
		 * @param $published the $published to set
		 */
		public function setPublished($published) {
			$this->published = $published;
			return $this;
		}											
	}	
	
	