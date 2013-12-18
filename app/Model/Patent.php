<?php
App::uses('AppModel', 'Model');
/**
 * Patent Model
 *
 * @property PatentOffice $PatentOffice
 */
class Patent extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PatentOffice' => array(
			'className' => 'PatentOffice',
			'foreignKey' => 'patent_office_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
