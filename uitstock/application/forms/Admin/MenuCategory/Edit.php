<?php
class Cloud_Form_Admin_MenuCategory_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin MenuCategory
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_category;
	
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
			  'value' => $this->_category->getName(),
		      'validators' => array(
		            array('UniqueMenuCategoryName', false, array(new
		            Cloud_Model_MenuCategory_CloudMenuCategoryMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('textarea', 'description', array(			   	      
		      'label' => 'Description',
		      'value' => $this->_category->getDescription(),
			  'attribs' => array(
					'cols' => 18,
					'rows' => 2,
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('submit', 'Thêm', array(              
		       'ignore' =>true,		      		   
		));
		
		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_category->getId(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));				
	}
	
	public function setCategory($category)
	{
		$this->_category = $category;		
	}
}