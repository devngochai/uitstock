<?php
	/**
	 * Class        : Article Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Article_CloudArticle
	{
		protected $id;		
		protected $cat_id;	
		protected $user_id;	
		protected $relative_id;		
		protected $title;							
		protected $alias;
		protected $summarize;
		protected $image;
		protected $content;
		protected $create_date;
		protected $modify_date;
		protected $published;
		protected $important;
		protected $count;
		
		
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
		 * @return the $cat_id
		 */
		public function getCat_id() {
			return $this->cat_id;
		}
	
			/**
		 * @return the $user_id
		 */
		public function getUser_id() {
			return $this->user_id;
		}
	
			/**
		 * @return the $relative_id
		 */
		public function getRelative_id() {
			return $this->relative_id;
		}
	
			/**
		 * @return the $title
		 */
		public function getTitle() {
			return $this->title;
		}
	
			/**
		 * @return the $alias
		 */
		public function getAlias() {
			return $this->alias;
		}
	
			/**
		 * @return the $summarize
		 */
		public function getSummarize() {
			return $this->summarize;
		}
	
			/**
		 * @return the $image
		 */
		public function getImage() {
			return $this->image;
		}
	
			/**
		 * @return the $content
		 */
		public function getContent() {
			return $this->content;
		}
	
			/**
		 * @return the $create_date
		 */
		public function getCreate_date() {
			return $this->create_date;
		}
	
			/**
		 * @return the $modify_date
		 */
		public function getModify_date() {
			return $this->modify_date;
		}
	
			/**
		 * @return the $published
		 */
		public function getPublished() {
			return $this->published;
		}
	
			/**
		 * @return the $important
		 */
		public function getImportant() {
			return $this->important;
		}
	
			/**
		 * @return the $count
		 */
		public function getCount() {
			return $this->count;
		}
	
			/**
		 * @param $id the $id to set
		 */
		public function setId($id) {
			$this->id = $id;
			return $this;
		}
	
			/**
		 * @param $cat_id the $cat_id to set
		 */
		public function setCat_id($cat_id) {
			$this->cat_id = $cat_id;
			return $this;
		}
	
			/**
		 * @param $user_id the $user_id to set
		 */
		public function setUser_id($user_id) {
			$this->user_id = $user_id;
			return $this;
		}
	
			/**
		 * @param $relative_id the $relative_id to set
		 */
		public function setRelative_id($relative_id) {
			$this->relative_id = $relative_id;
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
		 * @param $alias the $alias to set
		 */
		public function setAlias($alias) {
			$this->alias = $alias;
			return $this;
		}
	
			/**
		 * @param $summerize the $summarize to set
		 */
		public function setSummarize($summarize) {
			$this->summarize = $summarize;
			return $this;
		}
	
			/**
		 * @param $image the $image to set
		 */
		public function setImage($image) {
			$this->image = $image;
			return $this;
		}
	
			/**
		 * @param $content the $content to set
		 */
		public function setContent($content) {
			$this->content = $content;
			return $this;
		}
	
			/**
		 * @param $create_date the $create_date to set
		 */
		public function setCreate_date($create_date) {
			$this->create_date = $create_date;
			return $this;
		}
	
			/**
		 * @param $modify_date the $modify_date to set
		 */
		public function setModify_date($modify_date) {
			$this->modify_date = $modify_date;
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
		 * @param $important the $important to set
		 */
		public function setImportant($important) {
			$this->important = $important;
			return $this;
		}
	
			/**
		 * @param $count the $count to set
		 */
		public function setCount($count) {
			$this->count = $count;
			return $this;
		}						
											
	}	
	
	