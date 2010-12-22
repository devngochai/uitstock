<?php
	/**
	 * Class        : Page Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Page_CloudPage
	{
		protected $id;
		protected $component_id;
		protected $title;
		protected $name;	
		protected $published;
		protected $ordering;		
		protected $is_home;	
		
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
		 * @return the $title
		 */
		public function getTitle() {
			return $this->title;
		}
	
			/**
		 * @return the $name
		 */
		public function getName() {
			return $this->name;
		}
	
			/**
		 * @return the $published
		 */
		public function getPublished() {
			return $this->published;
		}
	
			/**
		 * @return the $ordering
		 */
		public function getOrdering() {
			return $this->ordering;
		}
	
			/**
		 * @return the $is_home
		 */
		public function getIs_home() {
			return $this->is_home;
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
		 * @param $title the $title to set
		 */
		public function setTitle($title) {
			$this->title = $title;
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
		 * @param $published the $published to set
		 */
		public function setPublished($published) {
			$this->published = $published;
			return $this;
		}
	
			/**
		 * @param $ordering the $ordering to set
		 */
		public function setOrdering($ordering) {
			$this->ordering = $ordering;
			return $this;
		}
	
			/**
		 * @param $is_home the $is_home to set
		 */
		public function setIs_home($is_home) {
			$this->is_home = $is_home;
			return $this;
		}										
	}	
	
	