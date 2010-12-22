<?php
class Cloud_Form_Admin_Page_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin Page
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
		      'value' => $this->_page->getTitle(),
		      'validators' => array(
		            array('UniquePageTitle', false, array(new
		            Cloud_Model_Page_CloudPageMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Name Page',
		      'value' => $this->_page->getName(),
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
		      'value' => $this->_page->getComponent_id(),
		      'multiOptions' => $component,
		));		
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',	
		       'value' => $this->_page->getPublished(),	       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
		
		$this->addElement('select', 'is_home', array(
			   'label' => 'Home Page',
		       'value' => $this->_page->getIs_home(),
		       'multiOptions' => array('0' => 'No', '1' => 'Yes')
		));
		
		$this->addElement('submit', 'Add', array(      
		       'label' => 'Sửa',        
		       'ignore' =>true,		      		   
		));
		
		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_page->getId(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));
		
		$this->addElement('hidden', 'ordering', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_page->getOrdering(),
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