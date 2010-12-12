<?php
class Cloud_Form_Admin_User_Add extends Zend_Form
{
	/**
	 * Class        : Add Admin User
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_roles;
	
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
		
		$this->addElement('text', 'full_name', array(	
		      'required' => true,			      
		      'label' => 'Họ tên',
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('password', 'password', array(	
		      'required' => true,			      
		      'label' => 'Mật khẩu',
		      'validators' => array(				
					array('StringLength', false, array(5, 50)),
		      ),
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
		
		$this->addElement('select', 'gender', array(
			   'label' => 'Giới tính',		       
		       'multiOptions' => array('1' => 'Con trai', '0' => 'Con gái')
		));	
		
		$this->addElement('text', 'birthday', array(				      
		      'label' => 'Ngày sinh',
		       'attribs' => array(
				    'class' => 'date',
			   ),		
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('text', 'email', array(	
		      'required' => true,			      
		      'label' => 'Email',
		      'validators' => array(
		            array('UniqueUserEmail', false, array(new
		            Cloud_Model_User_CloudUserMapper())),		
		            array('emailAddress', false),           
		      ),
			  'filters' => array('StringTrim'),		     
		));	
		
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
		
		$element = new Zend_Form_Element_File('avatar');
		$element->setLabel('Upload avatar')	
				->setDestination($path)	       
		        ->addValidator('Count', false, 1)
		        ->addValidator('Extension', false, 'jpg,png,gif');
		        
		$this->addElement($element);
		
		foreach ($this->_roles as $row) {
			$role[$row->id] = $row->name; 
		}
		
		$this->addElement('select', 'role_id', array(
		      'label' => 'Quyền hạn',
		      'multiOptions' => $role,
		));
		
		$this->addElement('select', 'is_enable', array(
			   'label' => 'Enable',		       
		       'multiOptions' => array('1' => 'Có', '0' => 'Không')
		));			
		
		$this->addElement('submit', 'Add', array(              
		       'ignore' =>true,		      		   
		));					
	}

	public function setRoles($roles)
	{
		$this->_roles = $roles;
	}
}