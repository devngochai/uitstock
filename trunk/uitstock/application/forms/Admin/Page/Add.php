<?php
class Cloud_Form_Admin_Page_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin Page
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_components;
	protected $_page;
	
	public function init()
	{		
		// thêm validator
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/Page',
		     'validate'
		);			
		
		$this->setMethod('post');				  
		
		$this->addElement('text', 'title', array(	
		      'required' => true,			      
		      'label' => 'Title Page',
		      'validators' => array(
		            array('UniquePageTitle', false, array(new
		            Cloud_Model_Page_CloudPageMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Name Page',
		      'validators' => array(
		            array('UniquePageName', false, array(new
		            Cloud_Model_Page_CloudPageMapper()))
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
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',		       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
		
		$this->addElement('select', 'is_home', array(
			   'label' => 'Home Page',
		       'multiOptions' => array('0' => 'No', '1' => 'Yes')
		));
		
		$this->addElement('submit', 'Add', array(              
		       'ignore' =>true,		      		   
		));
		
		$this->addElement('hidden', 'ordering', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => (int) $this->_page + 1,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
		
	}
	
	public function setComponents($components)
	{
		$this->_components = $components;
	}
	
	public function setPage($page)
	{
		$this->_page = $page;
	}
}