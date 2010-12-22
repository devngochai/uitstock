<?php
class Cloud_Form_Admin_MenuItem_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin MenuItem
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */	
	
	protected $_menuItems;	
	protected $_privileges;
	protected $_catId;
	
	public function init()
	{
		// thêm validator
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/MenuItem',
		     'validate'
		);	
										
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Menu Item Name',
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('text', 'alias', array(			      			      
		      'label' => 'Alias',
		      'validators' => array(
		            array('UniqueMenuItemAlias', false, array(new
		            Cloud_Model_MenuItem_CloudMenuItemMapper()))
		      ),		
			  'filters' => array('StringTrim'),		     
		));		
		
		$this->addElement('text', 'link', array(			      			      
		      'label' => 'Link',
			  'filters' => array('StringTrim'),		     
		));
		
		$menuItem[0] = 'No';
		foreach ($this->_menuItems as $row) {
			$menuItem[$row->id] = $row->name; 
		}
		
		$this->addElement('select', 'parent_id', array(
		      'label' => 'Parent',
		      'multiOptions' => $menuItem,
		));
				
		$privilege[0] = 'No';
		foreach ($this->_privileges as $row) {
			$privilege[$row['id']] = $row['name']; 
		}
		
		$this->addElement('select', 'pri_id', array(
		      'label' => 'Privilege',
		      'multiOptions' => $privilege,
		));
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
		
		$this->addElement('select', 'is_home', array(
			   'label' => 'Home',
		       'multiOptions' => array('0' => 'No', '1' => 'Yes')
		));
		
		$this->addElement('submit', 'Add', array(              
		       'ignore' =>true,		      		   
		));		
		
		$this->addElement('hidden', 'menu_cat_id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_catId,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));
	}
	
	public function setCatId($catId)
	{
		$this->_catId = $catId;
	}
	
	public function setMenuItems($menuItems)
	{
		$this->_menuItems = $menuItems;
	}	
	
	public function setPrivileges($privileges)
	{
		$this->_privileges = $privileges;
	}
}