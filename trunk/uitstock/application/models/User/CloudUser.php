<?php
	/**
	 * Class        : User Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_User_CloudUser
	{
		protected $id;
		protected $role_id;
		protected $full_name;
		protected $gender;
		protected $birthday;
		protected $email;
		protected $mobile;
		protected $address;
		protected $avatar;
		protected $password;				
		protected $is_enable;							
		
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
		 * @return the $full_name
		 */
		public function getFull_name() {
			return $this->full_name;
		}
	
			/**
		 * @return the $gender
		 */
		public function getGender() {
			return $this->gender;
		}
	
			/**
		 * @return the $birthday
		 */
		public function getBirthday() {
			return $this->birthday;
		}
	
			/**
		 * @return the $email
		 */
		public function getEmail() {
			return $this->email;
		}
	
			/**
		 * @return the $mobile
		 */
		public function getMobile() {
			return $this->mobile;
		}
	
			/**
		 * @return the $address
		 */
		public function getAddress() {
			return $this->address;
		}
	
			/**
		 * @return the $avatar
		 */
		public function getAvatar() {
			return $this->avatar;
		}
	
			/**
		 * @return the $password
		 */
		public function getPassword() {
			return $this->password;
		}
	
			/**
		 * @return the $is_enable
		 */
		public function getIs_enable() {
			return $this->is_enable;
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
		 * @param $full_name the $full_name to set
		 */
		public function setFull_name($full_name) {
			$this->full_name = $full_name;
			return $this;
		}
	
			/**
		 * @param $gender the $gender to set
		 */
		public function setGender($gender) {
			$this->gender = $gender;
			return $this;
		}
	
			/**
		 * @param $birthday the $birthday to set
		 */
		public function setBirthday($birthday) {
			$this->birthday = $birthday;
			return $this;
		}
	
			/**
		 * @param $email the $email to set
		 */
		public function setEmail($email) {
			$this->email = $email;
			return $this;
		}
	
			/**
		 * @param $mobile the $mobile to set
		 */
		public function setMobile($mobile) {
			$this->mobile = $mobile;
			return $this;
		}
	
			/**
		 * @param $address the $address to set
		 */
		public function setAddress($address) {
			$this->address = $address;
			return $this;
		}
	
			/**
		 * @param $avatar the $avatar to set
		 */
		public function setAvatar($avatar) {
			$this->avatar = $avatar;
			return $this;
		}
	
			/**
		 * @param $password the $password to set
		 */
		public function setPassword($password) {
			$this->password = $password;
			return $this;
		}
	
			/**
		 * @param $is_enable the $is_enable to set
		 */
		public function setIs_enable($is_enable) {
			$this->is_enable = $is_enable;
			return $this;
		}														
	}			