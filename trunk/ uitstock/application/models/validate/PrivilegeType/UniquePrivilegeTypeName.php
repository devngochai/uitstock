<?php
/**
	 * Class        : Unique Privilege Type Name
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniquePrivilegeTypeName extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Privilege "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_PrivilegeType_CloudPrivilegeTypeMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentPrivilegeType = new Cloud_Model_PrivilegeType_CloudPrivilegeType();
		if (!isset($context['id'])) $currentPrivilegeType = null;		
		else $this->_mapper->find($context['id'], $currentPrivilegeType);
				
		$privilegeType = $this->_mapper->getPrivilegeTypeByName($value, $currentPrivilegeType);
					
		if (null === $module)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}