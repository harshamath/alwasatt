<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	
		/* get uuid
	*	return
	* 		id
	* */
	function getIdByUuid($uuid){
		$recursion = $this->recursive;
		$this->recursive = -1;
		$id = $this->field('id',"uuid = '$uuid'");
		$this->recursive = $recursion;
		return $id;
	}

	/* get id
	*	return
	* 		uuid
	* */
	function getUuidById($id){
		$recursion = $this->recursive;
		$this->recursive = -1;
		$uuid = $this->field('uuid',"id = $id");
		$this->recursive = $recursion;
		return $uuid;
	}

	function getIdBySlug($slug){
		$temp = $this->recursive;
		$this->recursive = -1;
		
		$id = $this->field('id',"slug like '$slug'");
		$this->recursive = $temp;
		if( empty($id)){
			
			return false;
		}
		return $id;
	}

	function uniqueField( $data, $field ){
		$data = $this->data[ $this->name ][ $field ];
		$conditions = array(
			$field => $data
		);
		if( $this->id != null ){
			$conditions[ $this->primaryKey .' NOT'] = $this->id;
		}

		$exists = $this->find('count',array(
						'conditions' => $conditions
		));

		return ($exists == 0);
		return false;
	}
	
	function getDataByUuid($uuid, $fields=array('*')) { 
		
		if( !$this->hasField('uuid') ) {
			throw new AppException('UNABLE TO FIND BY UUID');
		}
		
		$recursion = $this->recursive;
		$this->recursive = -1;
		
		if( is_string($fields) ) {
			$fields = array($fields);
		}
		
		if( empty($fields) ) {
			$fields = array('id');
		}
		
		$data = $this->find( 'first', array(
					'conditions' => array(
						'uuid' => $uuid
					),
					'fields' => $fields
				));
		
		if( empty($data) ) {
			throw new AppException('INVALID UUID PROVIDED');
		}
		
		$this->recursive = $recursion;
		return $data;
	}
	
	function getDataById($id = NULL, $toFind='all', $fields=array('*')) { 
		
		if( !$this->hasField('id') ) {
			throw new AppException('UNABLE TO FIND BY ID');
		}
		
		if( empty($id) || (!is_numeric($id) && !is_array($id)) || (is_array($id) && !Set::numeric($id)) ) {
			throw new AppException('VALID ID REQUIRED');
		}
		
		$recursion = $this->recursive;
		$this->recursive = -1;
		
		if( is_string($fields) ) {
			$fields = array($fields);
		}
		
		if( empty($fields) ) {
			$fields = array('*');
		}
		
		$findOpts = array('first', 'all', 'list');
		
		if( empty($toFind) || !in_array($toFind, $findOpts) ){
			$toFind = 'first';
			if( is_array($id) ) {
				$toFind = 'all';
			}	
		}		
		
		$data = $this->find( $toFind, array(
					'conditions' => array(
						'id' => $id
					),
					'fields' => $fields
				));
		
		if( empty($data) ) {
			throw new AppException('VALID ID REQUIRED');
		}
		
		$this->recursive = $recursion;
		return $data;
	}

	function isExistById($id = NULL) { 

		if( empty($id) || !is_numeric($id) ) {
			throw new AppException('VALID ID REQUIRED');
		}
		
		$recursion = $this->recursive;
		$this->recursive = -1;
		
		$result = $this->field( 'id', 'id = '.$id );
		$this->recursive = $recursion;
		return empty($result) ? false : true;
	}

	function updateById($id, $dataToUpdate) { 
		
		if( !is_numeric($id) || !$this->isExistById($id) ) {
			throw new AppException('VALID ID REQUIRED');
		}
		
		if( !is_array($dataToUpdate) || empty($dataToUpdate) ) {
			throw new AppException('INVALID DATA PROVIDED.');
		}
		
		$recursion = $this->recursive;
		$this->recursive = -1;
		
		$dataToUpdate = isset($dataToUpdate[$this->name]) ? $dataToUpdate[$this->name] : $dataToUpdate;
		
		// dataToUpdate MUST be a simple 'field'=>'value' set in the form of key-value pair.
		// the following code will eliminate the data that is in the form of array, to filter the data in key-value format only.
		if( Set::countDim($dataToUpdate, true) > 1 ){
			foreach( $dataToUpdate as $dataField => $dataValue ){
				if( is_array($dataValue) ) {
					unset($dataToUpdate[$dataField]);
				}
			}
		}
		
		$this->id = $dataToUpdate['id'] = $id;
		
		if( !$this->save($dataToUpdate)	)  {
			$this->recursive = $recursion;
			throw new AppException('FAILED TO SAVE PROVIDED DATA.');
			//return false;
		}
		
		$this->recursive = $recursion;
		return true;
	}

	function deleteById($id) { 
		
		if( !$this->hasField('id') ) {
			return false;
		}
		
		$recursion = $this->recursive;
		$this->recursive = -1;
		
		$table = !empty($this->useTable) ? $this->useTable : $this->table;
		if( empty($table) ) {
			return false;
		}
		
		$query = "DELETE FROM " .$table. " WHERE";
		if( !is_array($id) ) {
			$query .= " id = " .$id;
		} else {
			$ids = implode(',', $id);
			$query .= " id IN (" .$id. ")";
		}
		
		//$this->query( "DELETE FROM " .$table. " WHERE id = " .$id );
		$this->query( $query );
		
		$this->recursive = $recursion;
		return true;
	}
}
