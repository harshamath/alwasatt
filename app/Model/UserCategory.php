<?php
class UserCategory extends AppModel {
	
	public $name = 'UserCategory';
	
	public function getUserCategories($groupByParent=true) {
		
		$fields = array('id', 'category_name');
		if($groupByParent){
			$fields = array( 'id', 'category_name', 'parent_id');	
		}
		
		return $this->find('list', array(
			'conditions' => array(
				'active' => 1
			),
			'fields' => $fields
		));
		
	}
}
