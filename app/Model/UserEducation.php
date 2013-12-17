<?php
class UserEducation extends AppModel {
	
	public $name = 'UserEducation';
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
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

}
