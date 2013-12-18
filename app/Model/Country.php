<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 * @property User $User
 */
class Country extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'country_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'country_id',
			'dependent' => false,
		),
		'State'
	);

	
		public function getCountryList( $keyField='id' ) {
		
		$keyFields = array('id', 'code', 'country_code');
		if( empty($keyField) || !in_array($keyField, $keyFields) ) {
			$keyField = 'id';	
		}
		
		$keyField = $keyField == 'code' ? 'country_code' : $keyField;
		$fields = array($keyField, 'country_name');
		
		$recursion = $this->recursive;
		$this->recursive = -1;
		
		$countries = $this->find('list', array(
			'conditions' => array(
				'active' => 1
			),
			'fields' => $fields
		));
		
		$this->recursive = $recursion;
		
		return $countries;
	}
	
	function getIdByCode($country_code){
		$temp = $this->recursive;
		$this->recursive = -1;
		
		$id = $this->field('id', "country_code like '$country_code'");
		$this->recursive = $temp;
		if( empty($id)) {
			return false;
		}
		
		return $id;
	}
}
