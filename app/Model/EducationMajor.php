<?php
class EducationMajor extends AppModel {
	
	public $name = 'EducationMajor';
	
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'user_education',
			'foreignKey' => 'education_major_id',
			'associationForeignKey' => 'user_id',
		//	'order' => array('EducationMajor.name')
		)
	);
}
