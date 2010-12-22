<?php
class Cloud_Form_Admin_User_Edit extends Zend_Form
{
	/**
	 * Class        : Edit Admin User
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	protected $_user;
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
			  'value' => $this->_user['full_name'],
			  'filters' => array('StringTrim'),		     
		));			
		
		$this->addElement('select', 'gender', array(
			   'label' => 'Giới tính',	
		       'value' => $this->_user['gender'],	       
		       'multiOptions' => array('1' => 'Con trai', '0' => 'Con gái')
		));	
		
		$this->addElement('text', 'birthday', array(				      
		      'label' => 'Ngày sinh',
		      'value' => Cloud_Model_Utli_CloudUtli::showDay($this->_user['birthday']),
		       'attribs' => array(
				    'class' => 'date',
			   ),		
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('text', 'email', array(	
		      'required' => true,			      
		      'label' => 'Email',
		      'value' => $this->_user['email'],
		      'validators' => array(
		           array('UniqueUserEmail', false, array(new
		            Cloud_Model_User_CloudUserMapper())),		
		            array('emailAddress', false),           
		      ),
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('text', 'mobile', array(				      
		      'label' => 'Số điện thoại',
		      'value' => $this->_user['mobile'],		
			  'filters' => array('StringTrim'),		     
		));	
		
		$this->addElement('textarea', 'address', array(			     		    		      
		      'label' => 'Địa chỉ nhà',
		      'value' => $this->_user['address'],
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
		
		$this->addElement('submit', 'Edit', array(              
		       'ignore' =>true,		      		   
		));	

		$this->addElement('hidden', 'id', array(
		       'filters' => array('StringTrim'),
		       'required' => true,
		       'value' => $this->_user['id'],
		       'decorators' => array('ViewHelper', array('HtmlTag',
		               array('tag' => 'dd', 'class' => 'noDisplay')))
		));	
	}
	
	public function setUser($user)
	{
		$this->_user = $user;
	}

	public function setRoles($roles)
	{
		$this->_roles = $roles;
	}
}