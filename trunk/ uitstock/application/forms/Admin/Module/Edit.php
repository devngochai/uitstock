<?php
class Cloud_Form_Admin_Module_Edit extends Zend_Form
{
	/**
	 * Class        : Add Admin Module
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_module;
	
	public function init()
	{		
		// thêm validator
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/Module',
		     'validate'
		);			
		
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Module name',
			  'value' => $this->_module->getName(),
		      'validators' => array(
		            array('UniqueModuleName', false, array(new
		            Cloud_Model_Module_CloudModuleMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));	

		$this->addElement('text', 'description', array(	
		      'required' => true,			      
		      'label' => 'Description',		
		      'value' => $this->_module->getDescription(),     
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',		   
		       'value' => $this->_module->getPublished(),         
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));			
		
		$this->addElement('submit', 'Edit', array(              
		       'ignore' =>true,		      		   
		));	

		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_module->getId(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
	}	

	public function setModule($module)
	{
		$this->_module = $module;		
	}
}