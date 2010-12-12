<?php
/**
	 * Class        : Unique Theme Path
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniqueThemePath extends Zend_Validate_Abstract
{
	const PATH_EXISTS = 'pathExists';
	
	protected $_messageTemplates = array(
	     self::PATH_EXISTS =>
	         'Đường dẫn Theme "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_Theme_CloudThemeMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);
		
		$currentTheme = new Cloud_Model_Theme_CloudTheme();
		if (!isset($context['id'])) $currentTheme = null;		
		else $this->_mapper->find($context['id'], $currentTheme);
		
		$component_id = $context['component_id'];        
		$Theme = $this->_mapper->getThemeByPath($value, $component_id, $currentTheme);
					
		if (null === $Theme)
		{
			return true;
		}
		$this->_error(self::PATH_EXISTS);
		return false;
	}
}