<?php
	/**
	 * Class        : Player Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_Player_CloudPlayer
	{
		protected $id;
		protected $level_id;
		protected $username;
		protected $password;
		protected $full_name;
		protected $gender;
		protected $birthday;	
		protected $address;		
		protected $email;
		protected $mobile;
		protected $job;
		protected $company;
		protected $is_enable;								
		protected $money;
		
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
				throw new Exception('Invalid player property');
			}
			$this->$method($value);
		}
		
		public function __get($name)
		{
			$method = 'get' . $name;
			if (('mapper' == $name) || !method_exists($this, $method)) {
				throw new Exception('Invalid player property');
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
		 * @return the $level_id
		 */
		public function getLevel_id() {
			return $this->level_id;
		}
	
			/**
		 * @return the $username
		 */
		public function getUsername() {
			return $this->username;
		}
	
			/**
		 * @return the $password
		 */
		public function getPassword() {
			return $this->password;
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
		 * @return the $address
		 */
		public function getAddress() {
			return $this->address;
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
		 * @return the $job
		 */
		public function getJob() {
			return $this->job;
		}
	
			/**
		 * @return the $company
		 */
		public function getCompany() {
			return $this->company;
		}
	
			/**
		 * @return the $is_enable
		 */
		public function getIs_enable() {
			return $this->is_enable;
		}
	
			/**
		 * @return the $money
		 */
		public function getMoney() {
			return $this->money;
		}
	
			/**
		 * @param $id the $id to set
		 */
		public function setId($id) {
			$this->id = $id;
			return $this;
		}
	
			/**
		 * @param $level_id the $level_id to set
		 */
		public function setLevel_id($level_id) {
			$this->level_id = $level_id;
			return $this;
		}
	
			/**
		 * @param $username the $username to set
		 */
		public function setUsername($username) {
			$this->username = $username;
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
		 * @param $address the $address to set
		 */
		public function setAddress($address) {
			$this->address = $address;
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
		 * @param $job the $job to set
		 */
		public function setJob($job) {
			$this->job = $job;
			return $this;
		}
	
			/**
		 * @param $company the $company to set
		 */
		public function setCompany($company) {
			$this->company = $company;
			return $this;
		}
	
			/**
		 * @param $is_enable the $is_enable to set
		 */
		public function setIs_enable($is_enable) {
			$this->is_enable = $is_enable;
			return $this;
		}
	
			/**
		 * @param $money the $money to set
		 */
		public function setMoney($money) {
			$this->money = $money;
			return $this;
		}																																
	}			