<?php
class Cloud_Form_Admin_Theme_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin Theme
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */

	protected $_components;
	protected $_theme;
	
	public function init()
	{					
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/Theme',
		     'validate'
		);				
		
		$this->setMethod('post');				  
		
		$this->addElement('text', 'name', array(	
		      'required' => true,			      
		      'label' => 'Tên Theme',
			  'value' => $this->_theme->getName(),
		      'validators' => array(
		            array('UniqueThemeName', false, array(new
		            Cloud_Model_Theme_CloudThemeMapper()))
		      ),
			  'filters' => array('StringTrim'),		     
		));	
		
		foreach ($this->_components as $row) {
			$component[$row->id] = $row->name; 
		}						
		
		$this->addElement('select', 'component_id', array(
		      'label' => 'Componennt',
			   'value' => $this->_theme->getComponent_id(),
		      'multiOptions' => $component,
		));

		$this->addElement('text', 'path', array(
		      'required' => true,	 		       
			  'label' => 'Đường dẫn Theme',
		      'value' => $this->_theme->getPath(),
		      'validators' => array(
		            array('UniqueThemePath', false, array(new
		            Cloud_Model_Theme_CloudThemeMapper()))
		      ),
			  'filters' => array('StringTrim'),
		));					
		
		$this->addElement('submit', 'Sửa', array(      
		       'required' => true,        
		       'ignore' => true,		           		   
		));
		
		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_theme->getId(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	

		$this->addElement('hidden', 'is_default', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_theme->getIs_default(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
	}
	
    public function setComponents($components)
	{
		$this->_components = $components;		
	}
	
	public function setTheme($theme)
	{
		$this->_theme = $theme;		
	}
}