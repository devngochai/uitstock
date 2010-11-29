<?php
	/**
	 * Class        : Page Widget Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_PageWidget_CloudPageWidget
	{
		protected $id;	
		protected $widget_id;	
		protected $page_id;		
		protected $position;
		protected $ordering;
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
		 * @return the $widget_id
		 */
		public function getWidget_id() {
			return $this->widget_id;
		}
	
			/**
		 * @return the $page_id
		 */
		public function getPage_id() {
			return $this->page_id;
		}
	
			/**
		 * @return the $position
		 */
		public function getPosition() {
			return $this->position;
		}
	
			/**
		 * @return the $ordering
		 */
		public function getOrdering() {
			return $this->ordering;
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
		 * @param $widget_id the $widget_id to set
		 */
		public function setWidget_id($widget_id) {
			$this->widget_id = $widget_id;
			return $this;
		}
	
			/**
		 * @param $page_id the $page_id to set
		 */
		public function setPage_id($page_id) {
			$this->page_id = $page_id;
			return $this;
		}
	
			/**
		 * @param $position the $position to set
		 */
		public function setPosition($position) {
			$this->position = $position;
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
		 * @param $published the $published to set
		 */
		public function setPublished($published) {
			$this->published = $published;
			return $this;
		}		
	}	
	
	