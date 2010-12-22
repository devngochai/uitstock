<?php
/**
	 * Class        : Unique Template Path
	 * Description  : Validate
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
class Cloud_Validate_UniqueTemplatePath extends Zend_Validate_Abstract
{
	const PATH_EXISTS = 'pathExists';
	
	protected $_messageTemplates = array(
	     self::PATH_EXISTS =>
	         'Đường dẫn template "%value%" này đã tồn tại',
	);
	
	public function __construct(Cloud_Model_Template_CloudTemplateMapper $mapper)
	{
		$this->_mapper = $mapper;
	}
	
	public function isValid($value, $context = null)
	{
		$this->_setValue($value);
		
		$currentTemplate = new Cloud_Model_Template_CloudTemplate();
		if (!isset($context['id'])) $currentTemplate = null;		
		else $this->_mapper->find($context['id'], $currentTemplate);
		
		$component_id = $context['component_id'];        
		$template = $this->_mapper->getTemplateByPath($value, $component_id, $currentTemplate);
					
		if (null === $template)
		{
			return true;
		}
		$this->_error(self::PATH_EXISTS);
		return false;
	}
}