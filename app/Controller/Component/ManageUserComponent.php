<?php

class ManageUserComponent extends Component {
	
	public function initialize(Controller $controller) {
		// Fired before the controller's beforeFilter method.
		$this->controller = $controller;
	}
	
	public function startup(Controller $controller) { 
		// Fired after the controller's beforeFilter method.
		
		// initializing User Model and associating with the component context.
		if( is_object($this->controller->User) ) {
			$this->User = $this->controller->User;
		} else {
			$this->User = ClassRegistry::init('User');
		}
	
	}
	
	public function getMemberTypeId() {
		App::import('model', array('UserType') );
		$userTypeObj = new UserType();
		
		$user_type = $userTypeObj->field( 'id', array('user_types' => 'user'));	
		return $user_type;
	}
	
	public function getUserData($userId=NULL){
		if( empty($userId) ){
			return NULL;	
		}
		
		$this->User->id = $userId;
		$user = $this->User->read();
		return $user;
	}
}
?>