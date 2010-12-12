<?php
class Cloud_Form_Admin_Privilege_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin Privilege
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	 
	 protected $_modules;
	
	public function init()
	{								
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Privilege name',		      
			  'filters' => array('StringTrim'),		     
		));	
		
		foreach ($this->_modules as $row) {
			$module[$row->id] = $row->name; 
		}
		
		$this->addElement('select', 'module_id', array(
		      'label' => 'Module',
		      'multiOptions' => $module,
		));	

		$this->addElement('text', 'description', array(	
		      'required' => true,			      
		      'label' => 'Description',		     
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('textarea', 'button1', array(			   	      
		      'label' => 'Button 1',
			  'attribs' => array(
					'cols' => 100,
					'rows' => 4,
				    'id' => 'Content',
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('textarea', 'button2', array(			    		      
		      'label' => 'Button 2',
			  'attribs' => array(
					'cols' => 100,
					'rows' => 4,
				    'id' => 'Content',
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('select', 'published', array(
			   'label' => 'Published',		       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));			
		
		$this->addElement('submit', 'Add', array(              
		       'ignore' =>true,		      		   
		));					
	}	
	
	public function setModules($modules)
	{
		$this->_modules = $modules;
	}	
}