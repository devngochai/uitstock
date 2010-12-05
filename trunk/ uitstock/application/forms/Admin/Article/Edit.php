<?php
class Cloud_Form_Admin_Article_Edit extends Zend_Form
{
	/**
	 * Class        : Add Admin Article
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
		
	protected $_article;
	protected $_categories;
	protected $_entries;
	
	public function init()
	{				
		$image = $this->_article->getImage();
		$path = substr($image, 0, strrpos($image, '/'));		
		$fileName = substr($image, strrpos($image, '/') + 1, strrpos($image, '.') - strrpos($image, '/') - 1);
		$up = 0;
		
		if (null == $path) {
			$folder = Zend_Date::now()->toString('yyyyMMdd');					
			$path = 'files/news/' . $folder;
			if (!is_dir($path)) mkdir($path);
			$fileName = "";
			$up = 1;
		}				
							
		$date = new Zend_Date();
		$date =  $date->get(Cloud_Model_Utli_CloudUtli::DATABASE_DATETIME);
		
		$relative = "";
		foreach ($this->_entries as $entry) {				
			if ($entry->relative_id == $this->_article->getId())
				$relative = $relative . ',' . $entry->id; 								
		}		
		$relative = substr($relative, 1);
		
		$this->setMethod('post');
		$this->setAttrib('enctype', 'multipart/form-data');				  
		
		$this->addElement('text', 'title', array(	
		      'required' => true,			      
		      'label' => 'Tiêu đề',		
			  'size' => 50,      
			  'value' => $this->_article->getTitle(),
			  'filters' => array('StringTrim'),		     
		));		

		foreach ($this->_categories as $row) {
			$category[$row->id] = $row->name; 
		}
		
		$this->addElement('select', 'cat_id', array(
		      'label' => 'Loại tin',
			   'value' => $this->_article->getCat_id(),
		      'multiOptions' => $category,
		));
		
		$this->addElement('text', 'listid_relative', array(			  	      
		      'label' => 'ID bài viết liên quan (cách nhau bằng dấu ,)',	
		      'value' => $relative,	      
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
			   'value' => $this->_article->getSummarize(),		      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('textarea', 'content', array(	
		      'required' => true,			      
		      'label' => 'Nội dung',
			  'attribs' => array(
					'cols' => 120,
					'rows' => 4,
					'id'   => 'Content',
			   ),	
			   'value' => $this->_article->getContent(),		   		      
			  'filters' => array('StringTrim'),		     
		));			

		$this->addElement('select', 'published', array(
			   'label' => 'Published',	
				'value' => $this->_article->getPublished(),	       
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
		
		$this->addElement('select', 'important', array(
			   'label' => 'Quan trọng',					      
		       'value' => $this->_article->getImportant(),   
		       'multiOptions' => array('1' => 'Yes', '0' => 'No')
		));
				
		$this->addElement('submit', 'Edit', array(              
		       'ignore' =>true,		      		   
		));	

		$this->addElement('hidden', 'user_id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_article->getUser_id(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	

		$this->addElement('hidden', 'relative_id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_article->getRelative_id(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));

		$this->addElement('hidden', 'create_date', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_article->getCreate_date(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));
		
		$this->addElement('hidden', 'count', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_article->getCount(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));
		
		$this->addElement('hidden', 'modify_date', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $date,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));

		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_article->getId(),
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
		
		$this->addElement('hidden', 'fileName', array(
		       'filters' => array('StringTrim'),		      
		       'value' => $fileName,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
		
		$this->addElement('hidden', 'up', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $up,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
	}	

	public function setArticle($article)
	{
		$this->_article = $article;
	}
	
	public function setCategories($categories)
	{
		$this->_categories = $categories;
	}
	
	public function setEntries($entries)
	{
		$this->_entries = $entries;
	}
}