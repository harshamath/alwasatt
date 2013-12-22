<?php
class Organization extends AppModel {
	
	public $name='Organization';
	
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'organization_id'
//			'associationForeignKey' => 'user_id',
		//	'order' => array('EducationMajor.name')
		)
	);
	
}
