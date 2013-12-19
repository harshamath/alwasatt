<?php

	$pluginPath = App::pluginPath('Api');
	$apiCachePath = $pluginPath.'tmp'.DS.'cache'.DS;
	
	define('ENABLE_CACHE', false);
	define('API_PATH', $pluginPath);
	define('API_CACHE', $apiCachePath);
	
	define('ERROR_INVALID_USER_ID', 'INVALID USER ID -OR- USER NOT FOUND');
	define('ERROR_INVALID_DATA', 'INVALID DATA PROVIDED');
	define('ERROR_INVALID_DATE', 'INVALID DATE PROVIDED');
		
	Cache::config('_cake_model_', array(
		/*
		'engine' => 'File',
		'prefix' => 'cake_model_plugin_',
		'path' => API_CACHE . 'models' . DS,
		'serialize' => false,
		//'duration' => '+999 days'
		*/
	));
	
	function is_valid_date($date){
	
		$date_parts = preg_split("/[\s-]+/", $date);
		if(!isset($date_parts[0]) || !isset($date_parts[1]) || !isset($date_parts[2]) ){
			return false;
		}else if(!checkdate($date_parts[1],$date_parts[2],$date_parts[0])){
			return false;
		}
		return true;
	}
	
	function is_past_date($date=NULL){
	
		if( empty($date) || !isValidDate($date) ) {
			return false;		
		}
		
		if( strtotime(date('Y-m-d')) > strtotime($date) ){
			return true;
		}
		
		return false;
		
	}
	
	function is_future_date($date=NULL){
	
		if( empty($date) || !isValidDate($date) ) {
			return false;		
		}
		
		if( strtotime(date('Y-m-d')) < strtotime($date) ){
			return true;
		}
		
		return false;
		
	}

	function  mdy_to_ymd( $date ,$join = '-') {
		list($mm,$dd,$yyyy) = split("[-/ ]",$date);
		return $yyyy.$join.$mm.$join.$dd;
	}

	function ymd_to_mdy( $date ,$join = '-') {
		list($yyyy,$mm,$dd) = split("[-/ ]",$date);
		return $mm.$join.$dd.$join.$yyyy;
	}
	
	function to_locale_format($date){
		
		if( !isValidDate($date) ) {
			return false;
		}
		
		$toTimeStamp = strtotime($date);
		$formatted_day = '';
		
		if( $toTimeStamp === strtotime(date('Y-m-d')) ) {
			$formatted_day = __sc('today', true);
		} else {
			$formatted_day = date('l', $toTimeStamp);
		}
		
		$formatted_fullMonth = date('F', $toTimeStamp);
		$formatted_shortMonth = date('M', $toTimeStamp);
		
		if( strlen($formatted_fullMonth) > 3 ) {
			$formatted_shortMonth .= '.';
		}
		
		$formatted_date = date('j', $toTimeStamp);
		$formatted_year = date('Y', $toTimeStamp);
		
		return $formatted_day . ', ' . $formatted_shortMonth . ' ' . $formatted_date . ', ' . $formatted_year;
	}

	function create_dates_array($days, $start_date=null, $dirc='next') {

    	if( !in_array($dirc, array('next', 'prev') ) ) {
    		$dirc = 'next';
    	}

       //CLEAR OUTPUT FOR USE
       $output = array();
		$days = $days - 1;
       	$start_date_str = !empty($start_date) ? strtotime(date('Y-m-d', strtotime($start_date))) : time() ;
		if($dirc == 'prev') {
			$end_date = date('Y-m-d',strtotime('-'.$days.' days',strtotime($start_date)));
		} else {
			$end_date = date('Y-m-d',strtotime('+'.$days.' days',strtotime($start_date)));
		}

        //SET CURRENT DATE
       $month = date("m", $start_date_str);
       $day = date("d", $start_date_str);
       $year = date("Y", $start_date_str);

        //LOOP THROUGH DAYS
       for($i=0; $i<=$days; $i++){
       		if($dirc == 'prev') {
       			$new_date = date('Y-m-d',mktime(0,0,0,$month,($day-$i),$year));
       		} else {
       			$new_date = date('Y-m-d',mktime(0,0,0,$month,($day+$i),$year));
       		}

			$output[] = $new_date;
			if($new_date == $end_date){
				break;
			}
       }

       //RETURN DATE ARRAY
       return $output;
   }

	function get_dates_interval($startDate, $endDate){

		if(!is_valid_date($startDate) || !is_valid_date($endDate)){
			return false;
		}

		if( strtotime($startDate) > strtotime($endDate) ) {
			return false;
		}

		$diff = abs(strtotime($endDate) - strtotime($startDate));
		return floor($diff/(3600*24));
	}
		//	4/21/2013
	// given a value in seconds, returns a hrs: mins string representation...
	function hrs_mins_str_by_secs( $sec_val = 0, $return_array=false ) {

		$txt_time = '--';
		if($return_array){
			$txt_time = array(
				'hrs' => 0,
				'mins' => 0
			);
		}

		if( !$sec_val || $sec_val == NULL || !is_numeric($sec_val) ) {
			return $txt_time;
		}

		$min_val = intval($sec_val / 60);
		$hrs_val = 0;

		if( $min_val >= 60 ) {
			$hrs_val = intval($min_val / 60);
			$min_val = $min_val % 60;

			if($return_array){
				$txt_time['hrs'] = $hrs_val;
			} else {

				$txt_time = $hrs_val.' hr';
				$txt_time .= $hrs_val > 1 ? 's' : '';
			}

			if( $min_val > 0 ) {

				if($return_array){
					$txt_time['mins'] = $min_val;
				} else {
					$txt_time .= ': '. $min_val.' min';
					$txt_time .= $min_val > 1 ? 's' : '';
				}
			}
		} else {
			if($return_array){
				$txt_time['mins'] = $min_val;
			} else {
				$txt_time = $min_val.' min';
				$txt_time .= $min_val > 1 ? 's' : '';
			}
		}

		return $txt_time;
	}

	function getWeekDays($returnFullText=true){
		
		$fullText = array(
			'1' => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
			
		$shortText = array(
			'1' => 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
			
		
		return $returnFullText ? $fullText : $shortText;
	}

	function round_to_half($num){
	
		if($num >= ($half = ($ceil = ceil($num))- 0.5) + 0.25) 
			return $ceil;
		else if($num < $half - 0.25) 
			return floor($num);
		else 
			return $half;
	}
	
	function get_cache_key($userId, $module, $date=null) {
		
		if(!empty($date)){
			if(is_array($date) && isset($date['start']) && isset($date['end']) ){
				$dateTime = date('YmdH', strtotime($date['start'])) .'-'. date('YmdH', strtotime($date['end']));
			} else {
				$dateTime = date('YmdH', strtotime($date));
			}
		} 
		else{
			$dateTime = date('YmdH');
		}
		
		$simpleKey = $userId . $module . $dateTime;
		return md5(serialize($simpleKey));
		
	}

	// can be used where cacheKey shall not be dependent on any date.	
	function get_global_cache_key($userId = NULL, $module = NULL ){
	
		if( empty($userId) || !is_numeric($userId) || empty($module) || !is_string($module) ) {
			return false;
		}
		
		$simpleKey = strtoupper($module) .'-'. $userId;
		return md5(serialize($simpleKey));
	}
	
	function get_cache($key){
		if( $data = Cache::read($key)){
			return $data;
		}
		return false;
	}
	
	function set_cache($key,$data){
		Cache::write($key,$data);
		return;
	}
	
	function delete_cacke($key){
		Cache::delete($key);
		return;
	}
	
	function array_filter_numeric($array){
		
		if( !is_array($array) || empty($array) ) {
			return false;
		}
		
		function test_numeric($val){
			return is_numeric($val);
		}
		
		return array_values(array_filter($array, 'test_numeric'));
	}
	
	function array_filter_empty($array_data, $remove_val=NULL){
		
		foreach($array_data as $index => $data){
			if($data==NULL || trim($data)== '' || empty($array_data[$index])){
				unset($array_data[$index]);
			} else if( $remove_val != NULL && is_string($remove_val) && $data == $remove_val ) {
				unset($array_data[$index]);
			} else {
				$array_data[$index] = trim($data);
			}
		}
		
		return array_values($array_data);
	}

	function array_fill_empty_index( $array_data, $fill_by_value = NULL ) {
	
		foreach($array_data as $index => $data){
			if($data==null || trim($data)=='' || empty($array_data[$index])){
				$array_data[$index] = $fill_by_value;
			}
		}
	}
	
?>