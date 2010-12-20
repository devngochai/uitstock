<?php
class Cloud_Form_Stock_Login extends Zend_Form
{
	/**
	 * Class        : Player Login
	 * Description  : Form
	 * Author       : Vita - Nguyen Ngoc Linh
	 * Student ID   : 07520194
	 * Faculty      : IS
	 */
	
	public function init()
	{						
		$this->setMethod('post');
		$this->addAttribs(array(         	   
			'class'    => 'form',  	
     	));		
	     			
		$this->addElement('text', 'username', array(	
		      'required' => true,			      
		      'label' => 'Tên đăng nhập',
		      'attribs' => array(
				    'class' => 'focus',
					'size' => 30,
			   ), 
			  'filters' => array('StringTrim'),			      	     
		));
		
		$this->addElement('password', 'password', array(	
		      'required' => true,			      
		      'label' => 'Mật khẩu',
		      'attribs' => array(				 
					'size' => 30,
			   ),		
			  'filters' => array('StringTrim'),		      		     
		));
		
		$this->addElement('checkbox', 'remember', array(	
		      'required' => true,			      
		      'label' => 'Ghi nhớ thông tin',
			  'filters' => array('StringTrim'),				           
		));	
		
		foreach($this->getElements() as $element) {
			$element->removeDecorator('HtmlTag')				
			        ->removeDecorator('DlDtDdWrapper')
			        ->removeDecorator('Label')
					->addDecorator('Label');								
		}				

		$this->addElement('submit', 'login', array(              
		       'ignore' =>true,	
			   'label' => 'Đăng nhập'						   		 		            		   
		));	

		$this->addDisplayGroup(
			array('username', 'password' ,'remember', 'login'),
			'group1',
			array(				
				'legend' => 'Đăng nhập',				
				'class' => 'g-green',			   
			)			
		);
	}	
}