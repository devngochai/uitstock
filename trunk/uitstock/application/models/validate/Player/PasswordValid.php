<?php
/**
	 * Class        : Password Valid
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_PasswordValid extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Mật khẩu cũ không đúng',
	);
	
	public function __construct(Cloud_Model_Player_CloudPlayerMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentPlayer = new Cloud_Model_Player_CloudPlayer();
		if (!isset($context['id'])) $currentPlayer = null;		
		else $this->_mapper->find($context['id'], $currentPlayer);
				
		$player = $this->_mapper->getPlayerByPassword($value, $currentPlayer);
					
		if (null != $player)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}