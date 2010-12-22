<?php
	/**
	 * Class        : Menu Item Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_MenuItem_CloudMenuItem
	{
		protected $id;
		protected $parent_id;
		protected $menu_cat_id;
		protected $pri_id;
		protected $name;	
		protected $alias;		
		protected $link;
		protected $ordering;		
		protected $published;
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
		 * @return the $parent_id
		 */
		public function getParent_id() {
			return $this->parent_id;
		}
	
			/**
		 * @return the $menu_cat_id
		 */
		public function getMenu_cat_id() {
			return $this->menu_cat_id;
		}
	
			/**
		 * @return the $pri_id
		 */
		public function getPri_id() {
			return $this->pri_id;
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
		 * @return the $link
		 */
		public function getLink() {
			return $this->link;
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
		 * @param $parent_id the $parent_id to set
		 */
		public function setParent_id($parent_id) {
			$this->parent_id = $parent_id;
			return $this;
		}
	
			/**
		 * @param $menu_cat_id the $menu_cat_id to set
		 */
		public function setMenu_cat_id($menu_cat_id) {
			$this->menu_cat_id = $menu_cat_id;
			return $this;
		}
	
			/**
		 * @param $pri_id the $pri_id to set
		 */
		public function setPri_id($pri_id) {
			$this->pri_id = $pri_id;
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
		 * @param $link the $link to set
		 */
		public function setLink($link) {
			$this->link = $link;
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
	
			/**
		 * @param $is_home the $is_home to set
		 */
		public function setIs_home($is_home) {
			$this->is_home = $is_home;
			return $this;
		}																												
	}			