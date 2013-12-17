<?php
class UserExperience extends AppModel {
	
	public $name = 'UserExperience';

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
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

}
