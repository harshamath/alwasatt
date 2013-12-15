<?php
App::uses('AppModel', 'Model');
/**
 * Skill Model
 *
 */
class Skill extends AppModel {

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
	public $displayField = 'skill_title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'skill_title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}