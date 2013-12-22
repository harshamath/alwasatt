<?php

class UserType extends AppModel {
	
	public $name = 'UserType';

	public function getMemberTypeId() {
		return $this->field( 'id', array('user_types' => 'user'));	
	}
	
	public function getAdminTypeId() {
		return $this->field( 'id', array('user_types' => 'web_admin'));	
	}
	
	public function getMasterAdminTypeId() {
		return $this->find( 'list', array(
			'conditions' => array(
				'user_types IN ' => array('web_admin', 'master_admin')
			),
			'fields' => array('user_types', 'id')	
		));	
	}
}
?>