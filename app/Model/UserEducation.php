<?php
class UserEducation extends AppModel {
	
	public $name = 'UserEducation';
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'fields' => array('id', 'first_name', 'last_name', 'email', 'birth_date')
		),
		'EducationMajor' => array(
			'className' => 'EducationMajor',
			'foreignKey' => 'education_major_id'
		),
		'EducationDegree' => array(
			'className' => 'EducationDegree',
			'foreignKey' => 'education_degree_id'
		),
		'EducationInstitute' => array(
			'className' => 'EducationInstitute',
			'foreignKey' => 'education_institute_id'
		)
	);
	
	public function findBYUserId($userId=NULL, $findType='all', $options=array() ){
		if( empty($userId) || !is_numeric($userId) ) {
			//throw new Exception('VALID USER ID REQUIRED');
			return NULL;	
		}
		
		$findTypes = array( 'first', 'all', 'count' );
		if( empty($findType) || !in_array($findType, $findTypes) ) {
			$findType = 'all';	
		}
		
		$conditions = array(
				'UserEducation.user_id' => $userId,
				'UserEducation.active' => 1
			);
		
		$order = 'start_date desc';
		
		$userEdu = $this->find( $findType, array(
			'conditions' => $conditions,
			'order' => $order
		));
		
		return $userEdu;
	}
	
}
