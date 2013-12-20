<?php
App::uses('Controller','Controller');
class ApiAppController extends Controller {

	const ERROR_CODE_200 = 200;
	const ERROR_CODE_401 = 401 ;
	const ERROR_CODE_406 = 406;
	const ERROR_CODE_407 = 407;

	const ERROR_DESC = 'UNKNOWN ERROR FOUND';
	const ERROR_DESC_SUCCESS = 'SERVICE SUCCESSFUL';
	const ERROR_FAIL = 'UNABLE TO COMPLY';
	const ERROR_SUCCESS = 'SUCCESS';
	const ERROR_OK = 'OK';
	const ERROR_ERROR = 'ERROR';
	const ERROR_EMPTY = 'NO RESULT';
	
	private $error_log;
	private $error_arch_log;
	protected $errorCode = self::ERROR_CODE_407;
	protected $errorDesc = self::ERROR_DESC;
	protected $status = self::ERROR_FAIL;
	protected $create_token = "4dee4872-8ba0-48b4-98cc-36a4c7cc8a23";
	protected $user = null;
	protected $user_id = null;
	protected $app_date = null;
	protected $plan_date = null;
	protected $plan_id = null;


	/*
	 * RC 424 is repeated code, we will keep the code which has RFC comliance
	 * disabling following 424 code, because of above reason
	 * mentioning code 424 below, for future reference
	 *
	 * @author WaQaR Aziz
	 * Date: 07/26/2012
	 */
	//'RC4xx' => array('424' => 'Method Failure (WebDAV)'),
	
	public static $http_codes = array( 
		
		//'1xx' => 'Informational'
		'RC100' => array('100' => 'Continue'),
		'RC101' => array('101' => 'Switching Protocols'),
		'RC102' => array('102' => 'Processing (WebDAV; RFC 2518)'),
		
		//'2xx' => 'Success'
		'RC200' => array('200' => 'OK'),
		'RC201' => array('201' => 'Created'),
		'RC202' => array('202' => 'Accepted'),
		'RC203' => array('203' => 'Non-Authoritative Information (since HTTP/1.1)'),
		'RC204' => array('204' => 'No Content'),
		'RC205' => array('205' => 'Reset Content'),
		'RC206' => array('206' => 'Partial Content'),
		'RC207' => array('207' => 'Multi-Status (WebDAV; RFC 4918)'),
		'RC208' => array('208' => 'Already Reported (WebDAV; RFC 5842)'),
		'RC226' => array('226' => 'IM Used (RFC 3229)'),
		
		//'3xx' => 'Redirection'
		'RC300' => array('300' => 'Multiple Choices'),
		'RC301' => array('301' => 'Moved Permanently'),
		'RC302' => array('302' => 'Found'),
		'RC303' => array('303' => 'See Other (since HTTP/1.1)'),
		'RC304' => array('304' => 'Not Modified'),
		'RC305' => array('305' => 'Use Proxy (since HTTP/1.1)'),
		'RC306' => array('306' => 'Switch Proxy'),
		'RC307' => array('307' => 'Temporary Redirect (since HTTP/1.1)'),
		'RC308' => array('308' => 'Permanent Redirect (experimental Internet-Draft)'),
		
		//'4xx' => 'Client Error'
		'RC400' => array('400' => 'Bad Request'),
		'RC401' => array('401' => 'Unauthorized'),
		'RC402' => array('402' => 'Payment Required'),
		'RC403' => array('403' => 'Forbidden'),
		'RC404' => array('404' => 'Not Found'),
		'RC405' => array('405' => 'Method Not Allowed'),
		'RC406' => array('406' => 'Not Acceptable'),
		'RC407' => array('407' => 'Proxy Authentication Required'),
		'RC408' => array('408' => 'Request Timeout'),
		'RC409' => array('409' => 'Conflict'),
		'RC410' => array('410' => 'Gone'),
		'RC411' => array('411' => 'Length Required'),
		'RC412' => array('412' => 'Precondition Failed'),
		'RC413' => array('413' => 'Request Entity Too Large'),
		'RC414' => array('414' => 'Request-URI Too Long'),
		'RC415' => array('415' => 'Unsupported Media Type'),
		'RC416' => array('416' => 'Requested Range Not Satisfiable'),
		'RC417' => array('417' => 'Expectation Failed'),
		'RC418' => array('418' => 'I\'m a teapot (RFC 2324)'),
		'RC420' => array('420' => 'Enhance Your Calm (Twitter)'),
		'RC422' => array('422' => 'Unprocessable Entity (WebDAV; RFC 4918)'),
		'RC423' => array('423' => 'Locked (WebDAV; RFC 4918)'),
		'RC424' => array('424' => 'Failed Dependency (WebDAV; RFC 4918)'),
		'RC425' => array('425' => 'Unordered Collection (Internet draft)'),
		'RC426' => array('426' => 'Upgrade Required (RFC 2817)'),
		'RC428' => array('428' => 'Precondition Required (RFC 6585)'),
		'RC429' => array('429' => 'Too Many Requests (RFC 6585)'),
		'RC431' => array('431' => 'Request Header Fields Too Large (RFC 6585)'),
		'RC444' => array('444' => 'No Response (Nginx)'),
		'RC449' => array('449' => 'Retry With (Microsoft)'),
		'RC450' => array('450' => 'Blocked by Windows Parental Controls (Microsoft)'),
		'RC451' => array('451' => 'Unavailable For Legal Reasons (Internet draft)'),
		'RC499' => array('499' => 'Client Closed Request (Nginx)'),
		
		//5xx => 'Server Error'
		'RC500' => array('500' => 'Internal Server Error'),
		'RC501' => array('501' => 'Not Implemented'),
		'RC502' => array('502' => 'Bad Gateway'),
		'RC503' => array('503' => 'Service Unavailable'),
		'RC504' => array('504' => 'Gateway Timeout'),
		'RC505' => array('505' => 'HTTP Version Not Supported'),
		'RC506' => array('506' => 'Variant Also Negotiates (RFC 2295)'),
		'RC507' => array('507' => 'Insufficient Storage (WebDAV; RFC 4918)'),
		'RC508' => array('508' => 'Loop Detected (WebDAV; RFC 5842)'),
		'RC509' => array('509' => 'Bandwidth Limit Exceeded (Apache bw/limited extension)'),
		'RC510' => array('510' => 'Not Extended (RFC 2774)'),
		'RC511' => array('511' => 'Network Authentication Required (RFC 6585)'),
		'RC598' => array('598' => 'Network read timeout error (Unknown)'),
		'RC599' => array('599' => 'Network connect timeout error (Unknown)'),
	);

	function beforeFilter(){
		
		/*CakePlugin::load( array(
			'Api' => array('bootstrap' => true)
		));*/
		Configure::write('debug', 0);
	}
		
	protected function set_error_log($str=''){
		$this->error_log .= $str;
	}

	protected function get_error_log(){
		return $this->error_log;
	}

	protected function reset_error_log(){
		$this->error_arch_log .= $this->error_log;
		unset($this->error_log);
	}

	protected function get_error_arch_log(){
		return $this->error_arch_log;
	}
	
	
	
	/*
	 * @author WaQaR Aziz
	 * @date 07/10/2012
	 */
	public function request_response($errorCode,$errorDesc,$status,$data=''){
		$response = array(
			'errorCode' => ($errorCode) ? $errorCode : $this->$errorCode,
			'errorDesc' => ($errorDesc) ? $errorDesc : $this->$errorDesc,
			'errorLog'=> $this->get_error_log(),
			'errorArchLog'=> $this->get_error_arch_log(),
			'status' => ($status) ? $status : $this->$status,
			'response'=>$data,
		);
		//following method is highly discouraged, see method notes, @author WaQaR Aziz
		echo $this->get_result($response);
		exit();
	}
	
	function get_result($response){
		// This method containd Artificial intelligence
		// this method should NOT be part of core-methods
		// remove this method from here , @author WaQaR Aziz
		
		$message = '';
		if(!empty($response['errorLog']) || !empty($response['errorArchLog']) ){
				if(!empty($response['errorLog']) && !empty($response['errorArchLog']) ){
					$message .= $response['errorLog']. "  ".$response['errorArchLog'];
				}else {
					$message = !empty($response['errorLog'])?$response['errorLog']:$response['errorArchLog'];	
				}
			return	json_encode(array('status' => '409', 'error' => $message));
		}else{
			return json_encode($response['response']);
		}
	}
	/*
	 * @author WaQaR Aziz
	 * @date 07/11/2012
	 */
	public function auto_request_response($errorCode,$errorDesc,$status,$data=''){
		$get_error_log = $this->get_error_log();
		if(!empty($get_error_log)){
			return $this->request_response(self::ERROR_CODE_407,self::ERROR_DESC,self::ERROR_FAIL,$data);
		}else{
			return $this->request_response($errorCode,$errorDesc,$status,$data);
		}
	}

	/*
	 * @author WaQaR Aziz
	 * @date 07/20/2012
	 */
	public function send_response($code,$reason='',$data=''){
		header('Content-type: text/json');
		list($key, $val) = each(self::$http_codes['RC'.$code]);
		
		$response = array(
			'errorCode' => $key,
			'errorDesc' => $val,
			'errorLog'=> $this->get_error_log(),
			'errorArchLog'=> $this->get_error_arch_log(),
			'status' => $reason,
			'data'=>$data,
		);
		
		$isTest = isset($_GET['isTest'])?$_GET['isTest']:'';
		//$isTest = (empty($isTest) && isset($_POST['isTest']))?$_POST['isTest']:$isTest;
		
		if($isTest != 1){
			
			list($key, $val) = each(self::$http_codes['RC'.$code]);
			$response = array(
				'errorCode' => $key,
				'errorDesc' => $val,
				'errorLog'=> $this->get_error_log(),
				'errorArchLog'=> $this->get_error_arch_log(),
				'status' => $reason,
				'data'=>$data,
			);
			
			$this->print_service_response($response);
			if( isset($_GET['sql']) && $_GET['sql'] == 1){
				$this->render('sql_dump');
				return;			
			}
			exit();
		} else {
			array($response);
			//$this->print_service_response($response);
			$this->layout = null;
			$this->set('response', $response);
			$this->view = "emptyview";
		}
	}

	/*
	 * 	This method will implement all the logic to print RESPONSE
	 *	@author WaQaR Aziz
	 * 	@date 07/20/2012
	 */
	public function print_service_response($response){
		echo json_encode($response);
	}
	
	public function send_error_response($error=NULL){
		
		if( empty($error) || !is_string($error) ) {
			$error = 'Unable to Response to Your Request';	
		}
		
		$response = array(
			'error' => $error
		);
		
		$this->send_response(self::ERROR_CODE_406, self::ERROR_ERROR, $response);
	}
	
	protected function _resetRegistry($resetPluginModel=false) {
		
		App::init();
		
		if($resetPluginModel){
			$pluginPath = App::pluginPath($this->plugin);
			App::build(array('Model' => array($pluginPath.'/Model')), App::RESET);
		} else {
			$modelPath = App::Path('Model');
			App::build(array('Model' => $modelPath), App::RESET);
		}
		
	}
	
}
?>