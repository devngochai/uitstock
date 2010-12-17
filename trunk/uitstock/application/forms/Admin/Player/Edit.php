<?php
class Cloud_Form_Admin_Player_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin Player
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
		
		$money = Zend_Locale_Format::toNumber($this->_player->getMoney(),
        						       array('locale' => 'en')
        );
		
		$this->setMethod('post');				  
		
		$this->addElement('text', 'username', array(	
		      'required' => true,			      
		      'label' => 'Username',
			  'value' => $this->_player->getUsername(),
			  'filters' => array('StringTrim'),		     
		));		
		
		$this->addElement('text', 'money', array(			  
		      'label' => 'Tổng tiền',
			  'value' => $money,
			  'attribs' => array(
				    'readonly' => true,
					//'disable' => 'disabled',
			   ),			  		     
		));	
		
		$this->addElement('text', 'full_name', array(	
		      'required' => true,			      
		      'label' => 'Họ tên',
			  'value' => $this->_player->getFull_name(),
			  'filters' => array('StringTrim'),		     
		));			
		
		$this->addElement('select', 'gender', array(
			   'label' => 'Giới tính',	
		       'value' => $this->_player->getGender(),	       
		       'multiOptions' => array('1' => 'Nam', '0' => 'Nữ')
		));	
		
		$this->addElement('text', 'birthday', array(				      
		      'label' => 'Ngày sinh',
		      'value' => Cloud_Model_Utli_CloudUtli::showDay($this->_player->getBirthday()),
		       'attribs' => array(
				    'class' => 'date',
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
		
		$this->addElement('text', 'mobile', array(				      
		      'label' => 'Số điện thoại',
		      'value' => $this->_player->getMobile(),		
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('textarea', 'address', array(			     		    		      
		      'label' => 'Địa chỉ nhà',
		      'value' => $this->_player->getAddress(),
			  'attribs' => array(
					'cols' => 15,
					'rows' => 2,				    
			   ),			      
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
		
		$this->addElement('select', 'status', array(
			   'label' => 'Status',		       
		       'multiOptions' => array('1' => 'Enable', '0' => 'Disable')
		));			
		
		$this->addElement('submit', 'Sửa', array(              
		       'ignore' =>true,		      		   
		));	

		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_player->id,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
	}
	
	public function setPlayer($player)
	{
		$this->_player = $player;
	}
}