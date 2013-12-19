<?php
class Occupation extends AppModel {
	
	public $name = 'Occupation';
	
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'user_experience',
			'foreignKey' => 'occupation_id',
			'associationForeignKey' => 'user_id',
		//	'order' => array('EducationMajor.name')
		)
	);
	
	public function findByKeyword($keyword=NULL){
		
		if( empty($keyword) || !is_string($keyword) ) {
			throw new Exception('SEARCH KEYWORD IS REQUIRED');		
		}
		
		$keyword = trim($keyword);
		$kw_cond = 'name LIKE ' .$keyword. '%';
		
		if( strlen($keyword) > 1 ) {
			$kw_parts = explode(' ', $keyword);
			$kw_cond = '';
			$kw_arr = array();
			foreach($kw_parts as $kw){
				$kw_arr[] = 'name LIKE "%' .$kw. '%"';
			}
			
			$kw_cond = implode(' AND ', $kw_arr);
		}
		
		$conditions = array(
			'active' => 1,
			$kw_cond
		);
		
		$result_limit = 20;
		
		$recursion = $this->recursive;
		$this->recursive = -1;
		
		$occupations = $this->find( 'list', array(
			'conditions' => $conditions,
			'fields' => array('id', 'name'),
			'order' => 'name asc',
			'limit' => $result_limit
		));
		
		if( empty($occupations) ) {
			throw new Exception('NO RESULT FOUND');	
		}
		
		return $occupations; //exit;		
	}
		
}
