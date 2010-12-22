<?php
	/**
	 * Class        : Player Session Model
	 * Description  :
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	class Cloud_Model_PlayerSession_CloudPlayerSession
	{
		protected $id;
		protected $user_id;
		protected $session_id;
		protected $ip;
		protected $browser;
		protected $lastVisit;
		
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
				throw new Exception('Invalid player session property');
			}
			$this->$method($value);
		}
		
		public function __get($name)
		{
			$method = 'get' . $name;
			if (('mapper' == $name) || !method_exists($this, $method)) {
				throw new Exception('Invalid player session property');
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
		 * @return the $user_id
		 */
		public function getUser_id() {
			return $this->user_id;
		}
	
			/**
		 * @return the $session_id
		 */
		public function getSession_id() {
			return $this->session_id;
		}
	
			/**
		 * @return the $ip
		 */
		public function getIp() {
			return $this->ip;
		}
	
			/**
		 * @return the $browser
		 */
		public function getBrowser() {
			return $this->browser;
		}
	
			/**
		 * @return the $lastVisit
		 */
		public function getLastVisit() {
			return $this->lastVisit;
		}
	
			/**
		 * @param $id the $id to set
		 */
		public function setId($id) {
			$this->id = $id;
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
		 * @param $session_id the $session_id to set
		 */
		public function setSession_id($session_id) {
			$this->session_id = $session_id;
			return $this;
		}
	
			/**
		 * @param $ip the $ip to set
		 */
		public function setIp($ip) {
			$this->ip = $ip;
			return $this;
		}
	
			/**
		 * @param $browser the $browser to set
		 */
		public function setBrowser($browser) {
			$this->browser = $browser;
			return $this;
		}
	
			/**
		 * @param $lastVisit the $lastVisit to set
		 */
		public function setLastVisit($lastVisit) {
			$this->lastVisit = $lastVisit;
			return $this;
		}
																																				
	}			