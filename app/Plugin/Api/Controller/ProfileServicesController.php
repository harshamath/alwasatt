<?php

class ProfileServicesController extends ApiAppController {

	var $name = 'ProfileServices';
	var $response = array();
	var $layout = null;
	public $data;
	
	public $components = array(
		'Api.Profile',
		'RequestHandler'
	);
	var $uses = array(
	);

	function beforeFilter() {
		parent::beforeFilter();
	}
	
	public function list_degrees(){
		
		if( empty($_REQUEST['query']) && empty($_REQUEST['q']) ){
			$this->send_error_response('SEARCH KEYWORD IS REQUIRED');
		}
		
		$keyword = !empty($_REQUEST['query']) ? $_REQUEST['query'] : $_REQUEST['q'];
		
		App::import('Model', array('EducationDegree'));	
		$educationDegreeObj = new EducationDegree();
		
		try{
			$educationDegrees = $educationDegreeObj->findByKeyword($keyword);
			$response['DegreeList'] = $educationDegrees;
			
			$this->send_response(parent::ERROR_CODE_200, parent::ERROR_OK, $response);
			 
		}catch(Exception $e){
			if( !empty($_REQUEST['reqType']) && $_REQUEST['reqType'] == 'ac_ajax' ) {
				$response['DegreeList'] = array();
				$this->send_response(parent::ERROR_CODE_200, parent::ERROR_EMPTY, $response);
			}
			$this->send_error_response( $e->getMessage() );
		}
	}
	
	public function major_fields_of_study(){
		
		if( empty($_REQUEST['query']) && empty($_REQUEST['q']) ){
			$this->send_error_response('SEARCH KEYWORD IS REQUIRED');
		}
		
		$keyword = !empty($_REQUEST['query']) ? $_REQUEST['query'] : $_REQUEST['q'];
		
		App::import('Model', array('EducationMajor'));	
		$educationMajorObj = new EducationMajor();
		
		try{
			$educationMajor = $educationMajorObj->findByKeyword($keyword);
			$response['MajorFields'] = $educationMajor;
			
			$this->send_response(parent::ERROR_CODE_200, parent::ERROR_OK, $response);
			 
		}catch(Exception $e){
			if( !empty($_REQUEST['reqType']) && $_REQUEST['reqType'] == 'ac_ajax' ) {
				$response['MajorFields'] = array();
				$this->send_response(parent::ERROR_CODE_200, parent::ERROR_EMPTY, $response);
			}
			$this->send_error_response( $e->getMessage() );
		}
		
	}
	
	public function college_search(){
		
		if( empty($_REQUEST['query']) && empty($_REQUEST['q']) ){
			$this->send_error_response('SEARCH KEYWORD IS REQUIRED');
		}
		
		$keyword = !empty($_REQUEST['query']) ? $_REQUEST['query'] : $_REQUEST['q'];
		
		App::import('Model', array('EducationInstitute'));	
		$educationInstituteObj = new EducationInstitute();
		
		try{
			$educationInstitute = $educationInstituteObj->findByKeyword($keyword);
			$response['Colleges'] = $educationInstitute;
			
			$this->send_response(parent::ERROR_CODE_200, parent::ERROR_OK, $response);
			 
		}catch(Exception $e){
			if( !empty($_REQUEST['reqType']) && $_REQUEST['reqType'] == 'ac_ajax' ) {
				$response['Colleges'] = array();
				$this->send_response(parent::ERROR_CODE_200, parent::ERROR_EMPTY, $response);
			}
			$this->send_error_response( $e->getMessage() );
		}
		
	}
	
	public function companies() { 
	
		if( empty($_REQUEST['query']) && empty($_REQUEST['q']) ){
			$this->send_error_response('SEARCH KEYWORD IS REQUIRED');
		}
		
		$keyword = !empty($_REQUEST['query']) ? $_REQUEST['query'] : $_REQUEST['q'];
		
		App::import('Model', array('Organization'));	
		$organizationObj = new Organization();
		
		try{
			$organization = $organizationObj->findByKeyword($keyword);
			$response['OrganizationsList'] = $organization;
			
			$this->send_response(parent::ERROR_CODE_200, parent::ERROR_OK, $response);
			 
		}catch(Exception $e){
			if( !empty($_REQUEST['reqType']) && $_REQUEST['reqType'] == 'ac_ajax' ) {
				$response['OrganizationsList'] = array();
				$this->send_response(parent::ERROR_CODE_200, parent::ERROR_EMPTY, $response);
			}
			$this->send_error_response( $e->getMessage() );
		}		
	}
	
	public function occupations(){
		
		if( empty($_REQUEST['query']) && empty($_REQUEST['q']) ){
			$this->send_error_response('SEARCH KEYWORD IS REQUIRED');
		}
		
		$keyword = !empty($_REQUEST['query']) ? $_REQUEST['query'] : $_REQUEST['q'];
		
		App::import('Model', array('Occupation'));	
		$occupationObj = new Occupation();
		
		try{
			$occupations = $occupationObj->findByKeyword($keyword);
			$response['JobTitles'] = $occupations;
			
			$this->send_response(parent::ERROR_CODE_200, parent::ERROR_OK, $response);
			 
		}catch(Exception $e){
			if( !empty($_REQUEST['reqType']) && $_REQUEST['reqType'] == 'ac_ajax' ) {
				$response['JobTitles'] = array();
				$this->send_response(parent::ERROR_CODE_200, parent::ERROR_EMPTY, $response);
			}
			$this->send_error_response( $e->getMessage() );
		}
		
	}
	
	public function skills(){
		
		if( empty($_REQUEST['query']) && empty($_REQUEST['q']) ){
			$this->send_error_response('SEARCH KEYWORD IS REQUIRED');
		}
		
		$keyword = !empty($_REQUEST['query']) ? $_REQUEST['query'] : $_REQUEST['q'];
		
		App::import('Model', array('Skill'));	
		$skillObj = new Skill();
		
		$options = array();
		
		if( !empty($_REQUEST['user']) ) {
			$userId = $skillObj->User->getIdByUuid($_REQUEST['user']);
			$currentSills = ClassRegistry::init('UserSkill')->findBYUserId($userId, 'list');
			if( !empty($currentSills) ) {
				$options['custom_conditions']['id NOT IN'] = $currentSills;	
			}
		}
		
		try{
			$skills = $skillObj->findByKeyword($keyword, 'all', $options);
			$response['SkillsList'] = $skills;
			
			$this->send_response(parent::ERROR_CODE_200, parent::ERROR_OK, $response);
			 
		}catch(Exception $e) {
			if( !empty($_REQUEST['reqType']) && $_REQUEST['reqType'] == 'ac_ajax' ) {
				$response['SkillsList'] = array();
				$this->send_response(parent::ERROR_CODE_200, parent::ERROR_EMPTY, $response);
			}
			$this->send_error_response( $e->getMessage() );
		}
		
	}
	
	
	public function add_user_skill() {
		
		$required = array( 'user' => 'User Id', 'skill_name' => 'Skill Title' );
		$missing = false;
			
		foreach($required as $reqd => $reqd_name){
			if( empty($_REQUEST[$reqd]) ) {
				$this->send_error_response( $reqd_name.' is Required' );	
			}
		}
				
		App::import('Model', array('UserSkill'));
		$userSkillObj = new UserSkill();
		
		$userId = $userSkillObj->User->getIdByUuid($_REQUEST['user']);
		if( !$userId || empty($userId) ) {
			$this->send_error_response( 'valid user id required' );
		}
		
		// check existing.
		$options['custom_conditions']['Skill.name LIKE'] = $_REQUEST['skill_name'];
		$currSkill = $userSkillObj->findBYUserId($userId, 'first', $options);
		
		if( !empty($currSkill) && $currSkill['User']['id'] == $userId && $currSkill['Skill']['name'] == $_REQUEST['skill_name'] ) {
			echo '"'.$_REQUEST['skill_name'].'" is already existing in this user\'s skill set';
			exit;
		}
		
		$skill_id = $_REQUEST['skill_id'];
		
		$dataToSave = array(
			'uuid' => String::uuid(),
			'user_id' => $userId,
			'skill_id' => $skill_id,
			'active' => 1
		);
		
		$userSkillObj->create();
		if( !$userSkillObj->save($dataToSave) ) {
			$this->send_error_response( 'unable to process the request' );
		}
		
		$newId = $userSkillObj->getLastInsertID();
		$response = array(
			'user_skill_id' => $newId,
			'user_skill_uuid' => $userSkillObj->getUuidById($newId),
			'skill_name' => $_REQUEST['skill_name']
		);
		
		$this->send_response(parent::ERROR_CODE_200, parent::ERROR_OK, $response);
		
	}
	
	public function remove_user_skill($user_skill_uuid=NULL) {
		
		if( empty($user_skill_uuid) ) {
			echo 'false';
			exit;	
		}
		
		App::import('Model', array('UserSkill'));
		$userSkillObj = new UserSkill();
		
		$user_skill_id = $userSkillObj->getIdByUuid($user_skill_uuid);
		
		if( empty($user_skill_id) ) {
			echo 'false'; exit;	
		}
		
		$userSkillObj->id = $user_skill_id;
		$userSkillObj->saveField('active', 0);
		
		echo 'true'; exit;
	}
	
}
?>