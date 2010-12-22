<?php
/**
	 * Class        : Unique Module Name
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniqueModuleName extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Module "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_Module_CloudModuleMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentModule = new Cloud_Model_Module_CloudModule();
		if (!isset($context['id'])) $currentModule = null;		
		else $this->_mapper->find($context['id'], $currentModule);
				
		$module = $this->_mapper->getModuleByName($value, $currentModule);
					
		if (null === $module)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}