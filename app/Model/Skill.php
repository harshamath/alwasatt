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
	
	public function findByKeyword($keyword=NULL, $findType='all', $options=array() ){
		
		if( empty($keyword) || !is_string($keyword) ) {
			throw new Exception('SEARCH KEYWORD IS REQUIRED');		
		}
		
		$findTypes = array( 'first', 'all', 'list', 'count' );
		if( empty($findType) || !in_array($findType, $findTypes) ) {
			$findType = 'all';	
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
		
		if( !empty($options) && !empty($options['custom_conditions']) ) {
			if( is_array($options['custom_conditions']) ) {
				foreach($options['custom_conditions'] as $cond_key => $cond_data){
					$conditions[$cond_key] = $cond_data;	
				}	
			}	
		}
				
		$result_limit = 20;
		
		$recursion = $this->recursive;
		$this->recursive = -1;
		
		$skills = $this->find( $findType, array(
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
