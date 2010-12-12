<?php
class Cloud_Form_Admin_Template_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin Template
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */

	protected $_components;
	protected $_template;
	
	public function init()
	{					
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/Template',
		     'validate'
		);				
		
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Tên template',
			  'value' => $this->_template->getName(),
		      'validators' => array(
		            array('UniqueTemplateName', false, array(new
		            Cloud_Model_Template_CloudTemplateMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));	
		
		foreach ($this->_components as $row) {
			$component[$row->id] = $row->name; 
		}						
		
		$this->addElement('select', 'component_id', array(
		      'label' => 'Componennt',
			   'value' => $this->_template->getComponent_id(),
		      'multiOptions' => $component,
		));

		$this->addElement('text', 'path', array(
		      'required' => true,	 		       
			  'label' => 'Đường dẫn Template',
		      'value' => $this->_template->getPath(),
		      'validators' => array(
		            array('UniqueTemplatePath', false, array(new
		            Cloud_Model_Template_CloudTemplateMapper()))
		      ),
			  'filters' => array('StringTrim'),
		));				
		
		$this->addElement('submit', 'Sửa', array(      
		       'required' => true,        
		       'ignore' => true,		           		   
		));
		
		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_template->getId(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	

		$this->addElement('hidden', 'is_default', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		        'value' => $this->_template->getIs_default(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
	}
	
    public function setComponents($components)
	{
		$this->_components = $components;		
	}
	
	public function setTemplate($template)
	{
		$this->_template = $template;		
	}
}