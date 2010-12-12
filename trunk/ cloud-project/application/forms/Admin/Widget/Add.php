<?php
class Cloud_Form_Admin_Widget_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin Widget
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
		     APPLICATION_PATH . '/models/validate/Widget',
		     'validate'
		);			
		
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Widget name',
		      'validators' => array(
		            array('UniquePageName', false, array(new
		            Cloud_Model_Page_CloudPageMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('text', 'path', array(	
		      'required' => true,			      
		      'label' => 'Path',		      
			  'filters' => array('StringTrim'),		     
		));
						
		foreach ($this->_components as $row) {
			$component[$row->id] = $row->name; 
		}
		
		$this->addElement('select', 'component_id', array(
		      'label' => 'Componennt',			  
		      'multiOptions' => $component,
		      'size' => '3',
			  'class' => 'selectChange com',
			  'path' => '/admin/page/getpagebycomponent',
			  'dest' => 'page',
		));	

		$this->addElement('select', 'page_id', array(
		      'label' => 'Page',		 	   
		      'multiOptions' => array(),
			  'path' => '/admin/widget/getorderbypage',	
		      'class' => 'page size50 selectChangeDouble',
		      'data' => 'position',
			  'dest' => 'ordering',       		      			  			  
		));	
		
		$this->addElement('select', 'position', array(
			   'label' => 'Position',		       
		       'multiOptions' => array(
		       		'Header' => 'Header', 'Left' => 'Left', 
		       		'Right' => 'Right', 'Footer' => 'Footer'),	
		       'path' => '/admin/widget/getorderbyposition',	
		       'class' => 'position selectChangeDouble',
		       'data' => 'page',
			   'dest' => 'ordering',       
		       'size' => '4',
		));
		
		$this->addElement('select', 'ordering', array(
			   'label' => 'Order',		       
		       'multiOptions' => array(),	
		       'class' => 'ordering size50',	       		
		));	

		$this->addElement('select', 'published', array(
			   'label' => 'Published',		       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));	
				
		$this->addElement('submit', 'Add', array(              
		       'ignore' =>true,		      		   
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