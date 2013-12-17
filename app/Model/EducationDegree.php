<?php

class EducationDegree extends AppModel {
	
	public $name = 'EducationDegree';
	
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'user_education',
			'foreignKey' => 'education_degree_id',
			'associationForeignKey' => 'user_id',
		//	'order' => array('EducationMajor.name')
		)
	);

	
}
