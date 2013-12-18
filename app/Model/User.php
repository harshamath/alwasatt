<?php	App::uses('AppModel', 'Model');

class User extends AppModel {

	public $name = 'User';
	
	var $belongsTo = array(
		'UserCategory' => array(
			/*'fields' => array(
				'category_name'
			)*/
		),
		'Industry',
		'Country' => array(
			'fields' => array(
				'country_code',
				'country_name as name'
			)
		)
	);
	
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'USERNAME IS REQUIRED',
				'allowEmpty' => false,
				'required' => true
			),
			'unique_user' => array(
				'rule' => array('isUnique'),
				'message' => 'USERNAME ALREADY EXIST',
				'on' => 'create'
			)
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'PASSWORD IS REQUIRED',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'USER FIRST NAME IS REQUIRED',
				'allowEmpty' => false,
				'required' => false,
			),
		),
//		'last_name' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				'message' => 'USER LAST NAME IS REQUIRED',
//				'allowEmpty' => false,
//				'required' => false,
//			),
//		),
//		'birth_date' => array(
//			'date' => array(
//				'rule' => array('date'),
//				'message' => 'Your custom message here',
//				'allowEmpty' => false,
//				'required' => false,
//			),
//		),
		'email_address' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'VALID EMAIL IS REQUIRED',
				'allowEmpty' => false,
				'required' => true,
			),
			'unique_email' => array(
				'rule' => 'isUnique',
				'message' => 'EMAIL ALREADY EXISTS',
				'on' => 'create'
			)
		)
	);
	
	public function isUsernameExist($username=NULL){
		
		if( empty($username) ) {
			throw new Exception('USERNAME NOT PROVIDED');	
		}
		
		$id = $this->field('id',"username = '$username'");
		if( !empty($id) || $id != NULL ) {
			return true;	
		}
		
		return false;
	}
	
	public function isUniqueUsername($username=NULL){
		try{
			!$this->isUsernameExist($username);
		}catch(Exception $e){
			throw $e;	
		}	
	}

	public function isEmailExist($email=NULL){
		
		if( empty($email) ) {
			throw new Exception('EMAIL NOT PROVIDED');	
		}
		
		$id = $this->field('id',"email = '$email'");
		if( !empty($id) || $id != NULL ) {
			return true;	
		}
		
		return false;
	}
	
	
	public function isUniqueEmail($email=NULL){
		try{
			!$this->isEmailExist($email);
		}catch(Exception $e){
			throw $e;	
		}	
	}

	
}
?>