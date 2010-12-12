<?php
class Cloud_Form_Admin_ContentCategory_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin Content Category
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
		
	protected $_parents;
	
	public function init()
	{		
		// thêm validator
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/ContentCategory',
		     'validate'
		);			
		
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Category Name',
		      'validators' => array(
		            array('UniqueContentCategoryName', false, array(new
		            Cloud_Model_ContentCategory_CloudContentCategoryMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('textarea', 'description', array(	
		      'required' => true,			      
		      'label' => 'Description',
			  'attribs' => array(
					'cols' => 40,
					'rows' => 4,
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$parent[0] = "No";
		foreach ($this->_parents as $row) {
			$parent[$row->id] = $row->name; 
		}
		
		$this->addElement('select', 'parent_id', array(
		      'label' => 'Sub',
		      'multiOptions' => $parent,
		));		
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',		       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
				
		$this->addElement('submit', 'Add', array(              
		       'ignore' =>true,		      		   
		));						
	}		
	
	public function setParents($parents)
	{
		$this->_parents = $parents;
	}
}