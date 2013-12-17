<?php
class EducationInstitute extends AppModel {
	
	public $name = 'EducationInstitute';
	
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'user_education',
			'foreignKey' => 'education_institute_id',
			'associationForeignKey' => 'user_id',
		//	'order' => array('EducationMajor.name')
		)
	);
	
	
}
