<?php
class Cloud_Form_Admin_MenuCategory_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin MenuCategory
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
		     APPLICATION_PATH . '/models/validate/MenuCategory',
		     'validate'
		);			
		
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Menu Category Name',
		      'validators' => array(
		            array('UniqueMenuCategoryName', false, array(new
		            Cloud_Model_MenuCategory_CloudMenuCategoryMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('textarea', 'description', array(			   	      
		      'label' => 'Description',
			  'attribs' => array(
					'cols' => 18,
					'rows' => 2,
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('submit', 'Add', array(              
		       'ignore' =>true,		      		   
		));
		
	}
}