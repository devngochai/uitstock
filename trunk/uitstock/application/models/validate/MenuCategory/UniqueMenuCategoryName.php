<?php
/**
	 * Class        : Unique Menu Category Name
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniqueMenuCategoryName extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Category "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_MenuCategory_CloudMenuCategoryMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentCategory = new Cloud_Model_MenuCategory_CloudMenuCategory();
		if (!isset($context['id'])) $currentCategory = null;		
		else $this->_mapper->find($context['id'], $currentCategory);
				
		$category = $this->_mapper->getMenuCategoryByName($value, $currentCategory);
					
		if (null === $category)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}