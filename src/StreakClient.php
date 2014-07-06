<?php

/* 
	Unofficial PHP Client for Streak. Added Functionality would be to have custom excel formulae.
	Applying Custom Formulae to the Spreadsheet view is not a part of Streak as of now. So, it would be
	great they could have this feature. 

	But you see, I can't wait. So lets build a client out of it which does it all.
*/

    define("apiKey","YOUR API KEY");
    define("baseURL","https://www.streak.com/api/v1");
    define("password","YOUR GMAIL PASSWORD");

	// Fucnction to send request to fetch the JSON response. 
	function sendGetRequest($url) {
		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_URL, $url);
		curl_setopt($curlSession, CURLOPT_USERPWD,apiKey.":".password);
		
		$data = curl_exec($curlSession);
		$resultCode = curl_getinfo($curlSession, CURLINFO_HTTP_CODE);
        curl_close($curlSession);

		if($resultCode == 200)
			return $data;
		else
			return $resultCode;
	}

	// Function to send a Delete CURL request
	function sendDeleteRequest($url) {
		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_URL, $url);
		curl_setopt($curlSession, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($curlSession, CURLOPT_USERPWD,apiKey.":".password);
		
		$data = curl_exec($curlSession);
		$resultCode = curl_getinfo($curlSession,CURLINFO_HTTP_CODE);

		if($resultCode == 200)
			return $data;
		else
			return $resultCode;
	}

	// Function to send Data with the request
	function sendPutRequest($params,$url) {
		
		$putData = '';
		foreach($params as $k => $v) {
			$putData .= $k.'='.$v.'&';
		}
		rtrim($putData, '&');

		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlSession, CURLOPT_POSTFIELDS, http_build_query($putData));
		curl_setopt($curlSession, CURLOPT_USERPWD,apiKey.":".password);
		
		curl_setopt($curlSession, CURLOPT_URL, $url);

		$data = curl_exec($curlSession);
		$resultCode = curl_getinfo($curlSession, CURLINFO_HTTP_CODE);

		if($resultCode == 200)
			return $data;
		else 
			return $resultCode;
	}

	//Function to send Data using POST with the request
	function sendPostRequest($params, $url) {
		
		$postData = '';
		foreach($params as $k => $v) {
			$postData .= $k.'='.$v.'&';
		}
		rtrim($postData, '&');

		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_URL, $url);
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlSession, CURLOPT_HTTPHEADER, "Content-Type: application/json");
		curl_setopt($curlSession, CURLOPT_POST, count($postData));
		curl_setopt($curlSession, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($curlSession, CURLOPT_USERPWD,apiKey.":".password);
		
		$outputData = curl_exec($curlSession);
		$resultCode = curl_getinfo($curlSession, CURLINFO_HTTP_CODE);

		if($resultCode == 200) {
			return $outputData;
		}
		else 
			return $resultCode;
    }

    //Testing the request methods.
    echo sendGetRequest("https://www.streak.com/api/v1/users/me -u 516572204c584c259617eee0465f6cde");



	
