<?php
class Cloud_Form_Admin_Component_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin Component
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_component;
	protected $_templates;
	protected $_themes;
		
	public function init()
	{			
		// thêm validator
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/Component',
		     'validate'
		);			
				
		$this->setMethod('post');	
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Tên component', 
		       'value' => $this->_component['component_name'],
		      'validators' => array(
		            array('UniqueComponentName', false, array(new
		            Cloud_Model_Component_CloudComponentMapper()))
		      ),   
			  'filters' => array('StringTrim'),		     
		));					
				
		foreach ($this->_templates as $row) {				
			$template[$row->id] = $row->name;	 								
		}		
				
		$this->addElement('select', 'template_id', array(
			   'label' => 'Template',
			   'value' => $this->_component['template_id'],		        
		       'multiOptions' => $template,
		));	

		foreach ($this->_themes as $row) {				
			$theme[$row->id] = $row->name;	 								
		}
		
		$this->addElement('select', 'theme_id', array(
			   'label' => 'Theme',
		       'value' => $this->_component['theme_id'],
		       'multiOptions' => $theme,
		));	
		
		$this->addElement('select', 'is_admin', array(
			   'label' => 'Backend',
		       'value' => $this->_component['is_admin'],
		       'multiOptions' => array('0' => 'Không', '1' => 'Có'),
		));	
		
		$this->addElement('submit', 'Sửa', array(              
		       'ignore' =>true,		      		   
		));			
		
		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_component['component_id'],
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));

		$this->addElement('hidden', 'ordering', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_component['component_order'],
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
		
	}
	
	public function setTemplates($templates)
	{
		$this->_templates = $templates;		
	}
	
	public function setThemes($themes)
	{
		$this->_themes = $themes;		
	}
	
	public function setComponent($component)
	{
		$this->_component = $component;
	}
}