<?php
class Organization extends AppModel {
	
	public $name='Organization';
	
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'user_experience',
			'foreignKey' => 'organization_id',
			'associationForeignKey' => 'user_id',
		//	'order' => array('EducationMajor.name')
		)
	);
	
}
