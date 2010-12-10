<?php
class Cloud_Form_Admin_Privilege_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin Privilege
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	 
	protected $_modules;
	protected $_privilege;
	
	public function init()
	{				
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Privilege name',
		      'value' => $this->_privilege['name'],		      
			  'filters' => array('StringTrim'),		     
		));	
		
		foreach ($this->_modules as $row) {
			$module[$row->id] = $row->name; 
		}
		
		$this->addElement('select', 'module_id', array(
		      'label' => 'Module',
		       'value' => $this->_privilege['module_id'],
		      'multiOptions' => $module,
		));	

		$this->addElement('text', 'description', array(	
		      'required' => true,			      
		      'label' => 'Description',	
		      'value' => $this->_privilege['description'],	     
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('textarea', 'button1', array(			   	      
		      'label' => 'Button 1',
		      'value' => $this->_privilege['button1'],	     
			  'attribs' => array(
					'cols' => 100,
					'rows' => 4,
				    'id' => 'Content',
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('textarea', 'button2', array(			    		      
		      'label' => 'Button 2',
		      'value' => $this->_privilege['button2'],	     
			  'attribs' => array(
					'cols' => 100,
					'rows' => 4,
				    'id' => 'Content',
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',		  
		       'value' => $this->_privilege['published'],	          
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));			
		
		$this->addElement('submit', 'Edit', array(              
		       'ignore' =>true,		      		   
		));	

		$this->addElement('hidden', 'id', array(
	       'filters' => array('StringTrim'),
	       'required' => true,
	       'value' => $this->_privilege['id'],
	       'decorators' => array('ViewHelper', array('HtmlTag',
	               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
		
		$this->addElement('hidden', 'privilege_id', array(
	       'filters' => array('StringTrim'),
	       'required' => true,
	       'value' => $this->_privilege['privilege_id'],
	       'decorators' => array('ViewHelper', array('HtmlTag',
	               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
	}	
	
	public function setModules($modules)
	{
		$this->_modules = $modules;
	}	
	
	public function setPrivilege($privilege)
	{
		$this->_privilege = $privilege;
	}
}