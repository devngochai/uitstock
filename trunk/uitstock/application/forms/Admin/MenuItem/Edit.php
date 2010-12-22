<?php
class Cloud_Form_Admin_MenuItem_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin MenuItem
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */	
	
	protected $_item;	
	protected $_privileges;	
	
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
			  'value' => $this->_item->getName(),
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('text', 'alias', array(			      			      
		      'label' => 'Alias',
		      'validators' => array(
		            array('UniqueMenuItemAlias', false, array(new
		            Cloud_Model_MenuItem_CloudMenuItemMapper()))
		      ),		
			  'value' => $this->_item->getAlias(),
			  'filters' => array('StringTrim'),		     
		));		
		
		$this->addElement('text', 'link', array(			      			      
		      'label' => 'Link',
			  'value' => $this->_item->getLink(),
			  'filters' => array('StringTrim'),		     
		));		
				
		$privilege[0] = 'No';
		foreach ($this->_privileges as $row) {
			$privilege[$row['id']] = $row['name']; 
		}
		
		$this->addElement('select', 'pri_id', array(
		      'label' => 'Privilege',
		      'value' => $this->_item->getPri_id(),
		      'multiOptions' => $privilege,
		));
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',
			   'value' => $this->_item->getPublished(),
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
		
		$this->addElement('select', 'is_home', array(
			   'label' => 'Home',
				'value' => $this->_item->getIs_home(),
		       'multiOptions' => array('0' => 'No', '1' => 'Yes')
		));
		
		$this->addElement('submit', 'Edit', array(              
		       'ignore' =>true,		      		   
		));

		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_item->getId(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));				
	}	
	
	public function setItem($item)
	{
		$this->_item = $item;
	}	
	
	public function setPrivileges($privileges)
	{
		$this->_privileges = $privileges;
	}
}