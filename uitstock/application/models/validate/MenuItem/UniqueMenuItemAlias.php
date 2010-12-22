<?php
/**
	 * Class        : Unique Menu Item Alias
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniqueMenuItemAlias extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Alias "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_MenuItem_CloudMenuItemMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentItem = new Cloud_Model_MenuItem_CloudMenuItem();
		if (!isset($context['id'])) $currentItem = null;		
		else $this->_mapper->find($context['id'], $currentItem);		
				
		$item = $this->_mapper->getItemByAlias($value, $currentItem);
					
		if (null === $item)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}