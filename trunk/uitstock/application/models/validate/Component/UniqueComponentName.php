<?php
/**
	 * Class        : Unique Component Name
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniqueComponentName extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Component "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_Component_CloudComponentMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentComponent = new Cloud_Model_Component_CloudComponent();
		if (!isset($context['id'])) $currentComponent = null;		
		else $this->_mapper->find($context['id'], $currentComponent);
				
		$component = $this->_mapper->getComponentByName($value, $currentComponent);
					
		if (null === $component)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}