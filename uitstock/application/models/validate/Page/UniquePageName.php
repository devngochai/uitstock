<?php
/**
	 * Class        : Unique Page Name
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniquePageName extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Page "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_Page_CloudPageMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentPage = new Cloud_Model_Page_CloudPage();
		if (!isset($context['id'])) $currentPage = null;		
		else $this->_mapper->find($context['id'], $currentPage);
		
		$component_id = $context['component_id'];
		$page = $this->_mapper->getPageByName($value, $component_id, $currentPage);
					
		if (null === $page)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}