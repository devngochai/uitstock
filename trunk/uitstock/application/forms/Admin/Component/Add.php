<?php
class Cloud_Form_Admin_Component_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin Component
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_component;
	
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
		      'validators' => array(
		            array('UniqueComponentName', false, array(new
		            Cloud_Model_Component_CloudComponentMapper()))
		      ),   
			  'filters' => array('StringTrim'),		     
		));		

		$this->addElement('select', 'is_admin', array(
		      'label' => 'Backend',
		      'multiOptions' => array('0' => 'Không', '1' => 'Có'),
		));
		
		$this->addElement('submit', 'Thêm', array(              
		       'ignore' =>true,		      		   
		));
		
		$this->addElement('hidden', 'ordering', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_component + 1,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));					
		
	}		
	
	public function setComponent($component)
	{
		$this->_component = $component;
	}
}