<?php
class Occupation extends AppModel {
	
	public $name = 'Occupation';
	
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'user_experience',
			'foreignKey' => 'occupation_id',
			'associationForeignKey' => 'user_id',
		//	'order' => array('EducationMajor.name')
		)
	);
	
}
