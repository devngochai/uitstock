<?php
/**
	 * Class        : Unique Content Category Name
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniqueContentCategoryName extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Category "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_ContentCategory_CloudContentCategoryMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentCategorry = new Cloud_Model_ContentCategory_CloudContentCategory();
		if (!isset($context['id'])) $currentCategorry = null;		
		else $this->_mapper->find($context['id'], $currentCategorry);
				
		$category = $this->_mapper->getContentCategoryByName($value, $currentCategorry);
					
		if (null === $category)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}