<?php
class Cloud_Form_Admin_Template_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin Template
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_components;
	
	public function init()
	{		
		// thêm validator
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/Template',
		     'validate'
		);			
		
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Tên template',
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
		      'multiOptions' => $component,
		));
		
		$this->addElement('text', 'path', array(
		      'required' => true,	 		       
			  'label' => 'Đường dẫn Template',
		      'validators' => array(
		            array('UniqueTemplatePath', false, array(new
		            Cloud_Model_Template_CloudTemplateMapper()))
		      ),
			  'filters' => array('StringTrim'),
		));
		
		$this->addElement('select', 'is_default', array(
			   'label' => 'Mặc định',
		       'multiOptions' => array('0' => 'Không', '1' => 'Có')
		));
		
		$this->addElement('submit', 'Thêm', array(              
		       'ignore' =>true,		      		   
		));
		
	}
	
	public function setComponents($components)
	{
		$this->_components = $components;
	}
}