<?php
class UserExperience extends AppModel {
	
	public $name = 'UserExperience';

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'fields' => array('id', 'first_name', 'last_name', 'email', 'birth_date')
		),
		'Occupation' => array(
			'className' => 'Occupation',
			'foreignKey' => 'occupation_id'
		),
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id'
		)
	);
	
	public function findBYUserId($userId=NULL, $findType='all', $options=array() ) {
		if( empty($userId) || !is_numeric($userId) ) {
			//throw new Exception('VALID USER ID REQUIRED');
			return NULL;	
		}
		
		$findTypes = array( 'first', 'all', 'count' );
		if( empty($findType) || !in_array($findType, $findTypes) ) {
			$findType = 'all';	
		}
		
		$conditions = array(
				'UserExperience.user_id' => $userId,
				'UserExperience.active' => 1
			);
		
		$order = 'start_date desc';
		
		$userExp = $this->find( $findType, array(
			'conditions' => $conditions,
			'order' => $order
		));
		
		return $userExp;
	}
	
	
}
