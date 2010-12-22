<?php
/**
	 * Class        : Unique Widget Name
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniqueWidgetName extends Zend_Validate_Abstract
{
	const NAME_EXISTS = 'nameExists';
	
	protected $_messageTemplates = array(
	     self::NAME_EXISTS =>
	         'Widget "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_Widget_CloudWidgetMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);					

		$currentWidget = new Cloud_Model_Widget_CloudWidget();
		if (!isset($context['id'])) $currentWidget = null;		
		else $this->_mapper->find($context['id'], $currentWidget);
		
		$page_id = $context['page_id'];
		$Widget = $this->_mapper->getWidgetByName($value, $page_id, $currentWidget);
					
		if (null === $Widget)
		{
			return true;
		}
		$this->_error(self::NAME_EXISTS);
		return false;
	}
}