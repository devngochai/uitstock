<?php
class Cloud_Form_Admin_ContentCategory_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin Content Category
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
		
	protected $_category;
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
			  'value' => $this->_category->getName(),
		      'validators' => array(
		            array('UniqueContentCategoryName', false, array(new
		            Cloud_Model_ContentCategory_CloudContentCategoryMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('textarea', 'description', array(	
		      'required' => true,			      
		      'label' => 'Description',
		      'value' => $this->_category->getDescription(),
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
		      'value' => $this->_category->getParent_id(),
		      'multiOptions' => $parent,
		));		
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',		  
			   'value' => $this->_category->getPublished(),     
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
				
		$this->addElement('submit', 'Edit', array(              
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
	
	public function setParents($parents)
	{
		$this->_parents = $parents;
	}
}