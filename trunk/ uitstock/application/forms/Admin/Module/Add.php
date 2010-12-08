<?php
class Cloud_Form_Admin_Module_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin Module
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
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
		      'validators' => array(
		            array('UniqueModuleName', false, array(new
		            Cloud_Model_Module_CloudModuleMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));	

		$this->addElement('text', 'description', array(	
		      'required' => true,			      
		      'label' => 'Description',		     
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',		       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));			
		
		$this->addElement('submit', 'Add', array(              
		       'ignore' =>true,		      		   
		));					
	}		
}