<?php
class Cloud_Form_Admin_Article_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin Article
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
		
	protected $_categories;
	
	public function init()
	{					
		$date = new Zend_Date();
		$date =  $date->get(Cloud_Model_Utli_CloudUtli::DATABASE_DATETIME);
		
		$this->setMethod('post');
		$this->setAttrib('enctype', 'multipart/form-data');				  
		
		$this->addElement('text', 'title', array(	
		      'required' => true,			      
		      'label' => 'Tiêu đề',		      
			  'filters' => array('StringTrim'),		     
		));		

		foreach ($this->_categories as $row) {
			$category[$row->id] = $row->name; 
		}
		
		$this->addElement('select', 'parent_id', array(
		      'label' => 'Loại tin',
		      'multiOptions' => $category,
		));
		
		$this->addElement('text', 'relative', array(	
		      'required' => true,			      
		      'label' => 'ID bài viết liên quan (cách nhau bằng dấu ,)',		      
			  'filters' => array('StringTrim'),		     
		));				
		
		$element = new Zend_Form_Element_File('image');
		$element->setLabel('Upload hình')		       
		        ->addValidator('Count', false, 1)
		        ->addValidator('Extension', false, 'jpg,png,gif');
		        		        
		$this->addElement($element, 'image');		        
		
		$this->addElement('textarea', 'summarize', array(	
		      'required' => true,			      
		      'label' => 'Tóm tắt',
			  'attribs' => array(
					'cols' => 40,
					'rows' => 4,
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('textarea', 'content', array(	
		      'required' => true,			      
		      'label' => 'Nội dung',
			  'attribs' => array(
					'cols' => 40,
					'rows' => 4,
			   ),			      
			  'filters' => array('StringTrim'),		     
		));			

		$this->addElement('select', 'published', array(
			   'label' => 'Published',		       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
		
		$this->addElement('select', 'important', array(
			   'label' => 'Quan trọng',		       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
				
		$this->addElement('submit', 'Add', array(              
		       'ignore' =>true,		      		   
		));	

		$this->addElement('hidden', 'user_id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => 1,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
		
		$this->addElement('hidden', 'create_date', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $date,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
	}		
	
	public function setCategories($categories)
	{
		$this->_categories = $categories;
	}
}