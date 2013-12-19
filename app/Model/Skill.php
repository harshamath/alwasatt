<?php
class Skill extends AppModel {
	
	public $name = 'Skill';
	
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'user_skills',
			'foreignKey' => 'skill_id',
			'associationForeignKey' => 'user_id',
			'order' => array('Skill.name')
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
		
		$skills = $this->find( 'list', array(
			'conditions' => $conditions,
			'fields' => array('id', 'name'),
			'order' => 'name asc',
			'limit' => $result_limit
		));
		
		if( empty($skills) ) {
			throw new Exception('NO RESULT FOUND');	
		}
		
		return $skills; //exit;		
	}
	
}
