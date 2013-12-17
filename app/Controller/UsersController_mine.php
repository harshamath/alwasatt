<?php

class UsersController extends AppController {

	public $name = 'Users';
	public $uses = array();
	public $layout = 'admin';
	
	public function admin_index(){
		
		App::import('model', array('UserType') );
		//$userObj = new User();
		$userTypeObj = new UserType();
		
		$user_type = $userTypeObj->field( 'id', array('user_types' => 'user'));
		
		$u = $this->User->find('all', array(
			'conditions' => array(
				'user_type_id' => $user_type
			)
		));
		
		
		$this->pageTitle = "Al-Wassat Social";
		$this->set('title_for_layout', "Al-Wassat Social");
		
		$this->set('users', $u);
		//exit;	
	}
	
}
?>