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
		$folder = Zend_Date::now()->toString('yyyyMMdd');					
		$path = 'files/news/' . $folder;
		if (!is_dir($path)) mkdir($path);
		
		$date = new Zend_Date();
		$date =  $date->get(Cloud_Model_Utli_CloudUtli::DATABASE_DATETIME);
		
		$this->setMethod('post');
		$this->setAttrib('enctype', 'multipart/form-data');				  
		
		$this->addElement('text', 'title', array(	
		      'required' => true,			      
		      'label' => 'Tiêu đề',		
			  'size' => 50,      
			  'filters' => array('StringTrim'),		     
		));		

		foreach ($this->_categories as $row) {
			$category[$row->id] = $row->name; 
		}
		
		$this->addElement('select', 'cat_id', array(
		      'label' => 'Loại tin',
		      'multiOptions' => $category,
		));
		
		$this->addElement('text', 'listid_relative', array(			  	      
		      'label' => 'ID bài viết liên quan (cách nhau bằng dấu ,)',		      
			  'filters' => array('StringTrim'),		     
		));				
		
		$element = new Zend_Form_Element_File('image');
		$element->setLabel('Upload hình')	
				->setDestination($path)	       
		        ->addValidator('Count', false, 1)
		        ->addValidator('Extension', false, 'jpg,png,gif');
		        		        
		$this->addElement($element);		        
		
		$this->addElement('textarea', 'summarize', array(			   	      
		      'label' => 'Tóm tắt',
			  'attribs' => array(
					'cols' => 120,
					'rows' => 4,
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('textarea', 'content', array(	
		      'required' => true,			      
		      'label' => 'Nội dung',
			  'attribs' => array(
					'cols' => 200,
					'rows' => 4,
				    'id' => 'Content',
			   ),			      
			  'filters' => array('StringTrim'),		     
		));			

		$this->addElement('select', 'published', array(
			   'label' => 'Published',		       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
		
		$this->addElement('select', 'important', array(
			   'label' => 'Quan trọng',		
			   'value' => 0,      
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
				
		$this->addElement('submit', 'Add', array(
			   'label' => 'Post',              
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
		
		$this->addElement('hidden', 'count', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => 0,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
		
		$this->addElement('hidden', 'relative_id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => 0,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	

		$this->addElement('hidden', 'path', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $path,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));
	}		
	
	public function setCategories($categories)
	{
		$this->_categories = $categories;
	}
}