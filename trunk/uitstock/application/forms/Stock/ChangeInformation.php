<?php
class Cloud_Form_Stock_ChangeInformation extends Zend_Form
{
	/**
	 * Class        : ChangeInformation Admin Player
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_player;
	
	public function init()
	{		
		// thêm validator
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/Player',
		     'validate'
		);		

		$this->setMethod('post');	
		$this->setAttrib('id', 'registerForm');

		$this->addElement('text', 'full_name', array(			      			      
		      'label' => 'Họ tên',	
		  	   'attribs' => array(
				    'class' => 'focus',				
			   ),		
			  'value' => $this->_player->getFull_name(),		  
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('text', 'username', array(	
		      'required' => true,			      
		      'label' => 'Username',		
			  'value' => $this->_player->getUsername(),
		  	   'attribs' => array(
					'class' => 'disable',
				    'readonly' => true,
					//'disable' => 'disabled',
			   ),	
			  'filters' => array('StringTrim'),		     
		));	

		$this->addElement('text', 'email', array(	
		      'required' => true,			      
		      'label' => 'Email',
		       'value' => $this->_player->getEmail(),	
		      'validators' => array(
		           array('UniquePlayerEmail', false, array(new
		            Cloud_Model_Player_CloudPlayerMapper())),		
		            array('emailAddress', false),           
		      ),			         
			  'filters' => array('StringTrim'),		     
		));						
		
		$this->addElement('select', 'gender', array(
			   'label' => 'Giới tính',	
			   'value' => $this->_player->getGender(),		       	       
		       'multiOptions' => array('1' => 'Nam', '0' => 'Nữ')
		));	
		
		$this->addElement('text', 'birthday', array(				      
		      'label' => 'Ngày sinh',		      
		       'attribs' => array(
				    'class' => 'date',
			   ),		
			   'value' => Cloud_Model_Utli_CloudUtli::showDay($this->_player->getBirthday()),
			  'filters' => array('StringTrim'),		     
		));												
		
		$this->addDisplayGroup(
			array('full_name', 'username', 'email', 'gender', 'birthday'),
			'group1',
			array(				
				'legend' => 'Thông tin chính',				
				'class' => 'group g-red',			   
			)			
		);
		
		$this->addElement('text', 'mobile', array(				      
		      'label' => 'Số điện thoại',		      		
			  'value' => $this->_player->getMobile(),
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('textarea', 'address', array(			     		    		      
		      'label' => 'Địa chỉ nhà',		      
			  'attribs' => array(
					'cols' => 20,
					'rows' => 2,				    
			   ),			      
			   'value' => $this->_player->getAddress(),
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('text', 'job', array(				      
		      'label' => 'Nghề nghiệp',		      		
			   'value' => $this->_player->getJob(),
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('text', 'company', array(				      
		      'label' => 'Nơi công tác',		    
		      'value' => $this->_player->getCompany(),  		
			  'filters' => array('StringTrim'),		     
		));		

		$this->addDisplayGroup(
			array('mobile', 'address' ,'job', 'company'),
			'group2',
			array(				
				'legend' => 'Thông tin khác',				
				'class' => 'group g-blue',			   
			)			
		);
		
		$this->addElement('submit','submit', array(              
		       'ignore' =>true,	
			   'label' => 'Cập nhật',		      		   
		));	
		
		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_player->getId(),
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));
		
		$this->addElement('hidden', 'is_enable', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => 1,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));
	}
	
	public function setPlayer($player)
	{
		$this->_player = $player;
	}
}