<?php
class UserSkill extends AppModel {
	
	public $name = 'UserSkill';
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'fields' => array('id', 'first_name', 'last_name', 'email', 'birth_date')
		),
		'Skill' => array(
			'className' => 'Skill',
			'foreignKey' => 'skill_id'
		)
	);	
	
	public function findBYUserId($userId=NULL, $findType='all', $options=array() ){
		if( empty($userId) || !is_numeric($userId) ) {
			//throw new Exception('VALID USER ID REQUIRED');
			return NULL;	
		}
		
		$findTypes = array( 'first', 'all', 'count', 'list' );
		if( empty($findType) || !in_array($findType, $findTypes) ) {
			$findType = 'all';	
		}
		
		$conditions = array(
				'UserSkill.user_id' => $userId,
				'UserSkill.active' => 1
			);
		
		if( !empty($options) && !empty($options['custom_conditions']) ) {
			if( is_array($options['custom_conditions']) ) {
				foreach($options['custom_conditions'] as $cond_key => $cond_data){
					$conditions[$cond_key] = $cond_data;	
				}	
			}	
		}
		
		$findQuery = array(
			'conditions' => $conditions,
			'group' => 'Skill.name'
		);
		
		if($findType == 'list'){
			$findQuery['fields'] = array('id', 'skill_id');
			$findQuery['group'] = 'skill_id';
		} else if($findType == 'all'){
			$findQuery['order'] = 'Skill.name asc';	
		}
		
		$userSkills = $this->find( $findType, $findQuery);
		
		return $userSkills;
	}
	
}
