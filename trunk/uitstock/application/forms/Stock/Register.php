<?php
class Cloud_Form_Stock_Register extends Zend_Form
{
	/**
	 * Class        : Register Player
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */	
	
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
		
		$this->addElement('text', 'username', array(	
		      'required' => true,			      
		      'label' => 'Username',	
		      'attribs' => array(
				    'class' => 'valid',
					'path'=> 'auth/check-username'
			   ),		  
		      'validators' => array(
		            array('UniquePlayerUsername', false, array(new
		            Cloud_Model_Player_CloudPlayerMapper()))
		      ),			   
			  'filters' => array('StringTrim'),		     
		));	

		$this->addElement('text', 'email', array(	
		      'required' => true,			      
		      'label' => 'Email',	
		      'attribs' => array(
					'class' => 'valid',
				    'path'=> 'auth/check-email'
			   ),	
		      'validators' => array(
		           array('UniquePlayerEmail', false, array(new
		            Cloud_Model_Player_CloudPlayerMapper())),		
		            array('emailAddress', false),           
		      ),			         
			  'filters' => array('StringTrim'),		     
		));	

		$this->addElement('password', 'password', array(	
		      'required' => true,			      
		      'label' => 'Mật khẩu',
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('password', 'password_confirm', array(	
		      'required' => true,			      
		      'label' => 'Nhập lại mật khẩu',
		      'validators' => array(
		            array('PasswordConfirmation', false),		
		            array('stringLength', false, array(5, 50)),
		      ),
			  'filters' => array('StringTrim'),	     
		));	
		
		$this->addElement('text', 'full_name', array(			      			      
		      'label' => 'Họ tên',			  
			  'filters' => array('StringTrim'),		     
		));			
		
		$this->addElement('select', 'gender', array(
			   'label' => 'Giới tính',			       	       
		       'multiOptions' => array('1' => 'Nam', '0' => 'Nữ')
		));	
		
		$this->addElement('text', 'birthday', array(				      
		      'label' => 'Ngày sinh',		      
		       'attribs' => array(
				    'class' => 'date',
			   ),		
			  'filters' => array('StringTrim'),		     
		));			
							
		$captcha = $this->createElement('captcha', 'captcha',
                array('required' => true,
                'captcha' => array('captcha' => 'Image',
                        'font' => 'files/upload/files/font/arial.ttf',
                        'fontSize' => '24',
                        'wordLen' => 5,
                        'height' => '50',
                        'width' => '150',
                        'imgDir' => 'files/upload/files/captcha',
                        'imgUrl' => 'files/upload/files/captcha',                                
                        'dotNoiseLevel' => 50,
                        'lineNoiseLevel' => 5)));

        $captcha->setLabel('Nhập ký tự bảo vệ:');                

        $this->addElement($captcha); 		
		
		$this->addDisplayGroup(
			array('username', 'email', 'password', 'password_confirm', 'full_name' , 'gender', 'birthday', 'captcha'),
			'group1',
			array(				
				'legend' => 'Thông tin chính',				
				'class' => 'group g-red',			   
			)			
		);
		
		$this->addElement('text', 'mobile', array(				      
		      'label' => 'Số điện thoại',		      		
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('textarea', 'address', array(			     		    		      
		      'label' => 'Địa chỉ nhà',		      
			  'attribs' => array(
					'cols' => 15,
					'rows' => 2,				    
			   ),			      
			  'filters' => array('StringTrim'),		     
		));
		
		$this->addElement('text', 'job', array(				      
		      'label' => 'Nghề nghiệp',		      		
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('text', 'company', array(				      
		      'label' => 'Nơi công tác',		      		
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
			   'label' => 'Đăng ký',		      		   
		));	
		
		$this->addElement('hidden', 'is_enable', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => 1,
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));
	}		
}