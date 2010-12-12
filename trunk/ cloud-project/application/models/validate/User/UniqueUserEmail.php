<?php
/**
	 * Class        : Unique User Email
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniqueUserEmail extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Email "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_User_CloudUserMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentUser = new Cloud_Model_User_CloudUser();
		if (!isset($context['id'])) $currentUser = null;		
		else $this->_mapper->find($context['id'], $currentUser);
				
		$user = $this->_mapper->getUserByEmail($value, $currentUser);
					
		if (null === $user)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}