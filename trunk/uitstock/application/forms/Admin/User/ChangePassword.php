<?php
class Cloud_Form_Admin_User_ChangePassword extends Zend_Form
{
	/**
	 * Class        : Change Password User
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_user;
	
	public function init()
	{		
		// thêm validator
		$this->addElementPrefixPath(
		     'Cloud_Validate',
		     APPLICATION_PATH . '/models/validate/User',
		     'validate'
		);		

		$path = 'files/avatar/user/';
		
		$this->setMethod('post');				  
		
		$this->addElement('password', 'password', array(	
		      'required' => true,			      
		      'label' => 'Mật khẩu cũ',
		      'validators' => array(							
					array('PasswordValid', false, array(new
		            Cloud_Model_User_CloudUserMapper())),
					array('StringLength', false, array(5, 50)),					
		      ),
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('password', 'password_confirm', array(	
		      'required' => true,			      
		      'label' => 'Nhập lại mật khẩu cũ',
		      'validators' => array(
		            array('PasswordConfirmation', false),		
		            array('stringLength', false, array(5, 50)),
		      ),
			  'filters' => array('StringTrim'),	     
		));	
		
		$this->addElement('password', 'new_password', array(	
		      'required' => true,			      
		      'label' => 'Mật khẩu mới',
		      'validators' => array(							
					array('StringLength', false, array(5, 50)),
		      ),
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('submit', 'Change', array(              
		       'ignore' =>true,		      		   
		));	

		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_user['id'],
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
		
		$this->addElement('hidden', 'email', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_user['email'],
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
	}
	
	public function setUser($user)
	{
		$this->_user = $user;
	}
}