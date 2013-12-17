<?php
class Country extends AppModel {
	
	var $name = 'Country';
	
	var $hasMany = array(
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
?>