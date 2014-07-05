<?php

/* 
	Unofficial PHP Client for Streak. Added Functionality would be to have custom excel formulae.
	Applying Custom Formulae to the Spreadsheet view is not a part of Streak as of now. So, it would be
	great they could have this feature. 

	But you see, I can't wait. So lets build a client out of it which does it all.
*/


// TODO: Remember to write individual functions for getting the Pipeline Key and the Box Key and the Stage Key.

public $apiKey = $_GET['apiKey'];
public $baseURL = "https://www.streak.com/api/v1/";

class StreakClient {
	
	// Fucnction to send request to fetch the JSON response. 
	public function sendGetRequest($url) {
		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_URL, $url);
			
		$data = curl_exec($curlSession);
		$resultCode = curl_getinfo($curlSession, CURLINFO_HTTP_CODE);

		if($resultCode == 200)
			return $data;
		else 
			return $resultCode
	}

	// Function to send a Delete CURL request
	public function sendDeleteRequest($url) {
		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_URL, $url);
		curl_setopt($curlSession, CURLOPT_CUSTOMREQUEST, 'DELETE');

		$data = curl_exec($curlSession);
		$resultCode = curl_getinfo($curlSession,CURLINFO_HTTP_CODE);

		if($resultCode == 200)
			return $data;
		else
			return $resultCode;
	}

	// Function to send Data with the request
	public function sendPutRequest($params,$url) {
		
		$putData = '';
		foreach($params as $k => $v) {
			$putData .= $k.'='.$v.'&';
		}
		rtrim($putData, '&');

		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlSession, CURLOPT_POSTFIELDS, http_build_query($putdata));
		curl_setopt($curlSession, CURLOPT_URL, $url);

		$data = curl_exec($curlSession);
		$resultCode = curl_getinfo($curlSession, CURLINFO_HTTP_CODE);

		if($resultCode == 200)
			return $data;
		else 
			return $resultCode;
	}

	//Function to send Data using POST with the request
	public function sendPostRequest($params, $url) {
		
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

		$outputData = curl_exec($curlSession);
		$resultCode = curl_getinfo($curlSession, CURLINFO_HTTP_CODE);

		if($resultCode == 200) {
			return $outputData;
		}
		else 
			return $resultCode;
	}
}
	
