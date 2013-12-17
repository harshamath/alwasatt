<?php
App::uses('AppModel', 'Model');
/**
 * Experience Model
 *
 */
class Experience extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
//	public $useDbConfig = 'cakephp';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'designation';

	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'resume_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);		
}
