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
	
	public function occupations(){
		
		if( empty($_REQUEST['query']) && empty($_REQUEST['q']) ){
			$this->send_error_response('SEARCH KEYWORD IS REQUIRED');
		}
		
		$keyword = !empty($_REQUEST['query']) ? $_REQUEST['query'] : $_REQUEST['q'];
		
		App::import('Model', array('Occupation'));	
		$occupationObj = new Occupation();
		
		try{
			$occupations = $occupationObj->findByKeyword($keyword);
			$response['Occupations'] = $occupations;
			
			$this->send_response(parent::ERROR_CODE_200, parent::ERROR_OK, $response);
			 
		}catch(Exception $e){
			if( !empty($_REQUEST['reqType']) && $_REQUEST['reqType'] == 'ac_ajax' ) {
				$response['Occupations'] = array();
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
		
		try{
			$skills = $skillObj->findByKeyword($keyword);
			$response['Skills'] = $skills;
			
			$this->send_response(parent::ERROR_CODE_200, parent::ERROR_OK, $response);
			 
		}catch(Exception $e) {
			if( !empty($_REQUEST['reqType']) && $_REQUEST['reqType'] == 'ac_ajax' ) {
				$response['Skills'] = array();
				$this->send_response(parent::ERROR_CODE_200, parent::ERROR_EMPTY, $response);
			}
			$this->send_error_response( $e->getMessage() );
		}
		
	}
	
}
?>