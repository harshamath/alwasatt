<?php
class Industry extends AppModel {
	
	public $name = 'Industry';
	
	public function getIndustryList( $keyField = 'id' ) {
		
		$keyFields = array( 'id', 'uuid', 'slug' );
		if( empty($keyField) || !in_array($keyField, $keyFields) ) {
			$keyField = 'id';	
		}
		
		$fields = array($keyField, 'name');
		
		$recursion = $this->recursive;
		$this->recursive = -1;
		
		$industries = $this->find('list', array(
			'conditions' => array(
				'active' => 1
			),
			'fields' => $fields
		));
		
		$this->recursive = $recursion;
		
		return $industries;
	}
}
