<?php
	function traiter_cookies_v($cookie_code) {
		$cookie_array= array();
		$cookie_code=explode('||', $cookie_code);
		foreach ($cookie_code as $i=>$toinert) {
			if (!empty($toinert)) $cookie_array[]=json_decode($toinert);
		}
		return $cookie_array;
	}

//=> exemple
	$codo='||{"id":"Medieval","city":"Paris","activity":"Medieval","price":"240","date":"28/4/2017","time_1":"11:00","time_2":"12:00"}||{"id":"Medieval","city":"Paris","activity":"Medieval","price":"240","date":"28/4/2017","time_1":"11:00","time_2":"12:00"}';
	$doce=traiter_cookies_v($codo);
	var_dump($doce);
?>