<?php

include 'StreakClient.php';

/**************************************************************
/*					PIPELINE OPERATIONS						  *	
/**************************************************************/

// Will fetch the current user with the input API Key
	function getCurrentUser() {
		$requestURL = baseURL."/users/me -u ".apiKey;
        echo $requestURL;
		$data = sendGetRequest($requestURL);
        return $data;
	}


	// Get all the pipelines for that user
	function getUserPipelines() {
		$requestURL = baseURL."/pipelines -u ".apiKey;
        echo $requestURL;
        $data = sendGetRequest($requestURL);
        return $data;
	}

	// Get Specific pipeline out of the all the pipelines 
	function getSpecificPipeline($pipelineKey) {
		$requestURL = baseURL."/pipelines/{".$pipelineKey."} -u ".apiKey;
        $data = sendGetRequest($requestURL);
        return $data;
	}

	// Create a Pipeline based on user inputs
	function createPipeline($name,$description) {

		$inputData = array("name" => $name,
					  "description" => $description
			);

		$requestURL = baseURL."/pipelines -u ".apiKey;
        $data = sendPutRequest($inputData, $requestURL);
        return $data;
	}

	// Delete a Pipeline of the user
	function deletePipeline($pipelineKey) {
		$requestURL = baseURL."/pipelines/{".$pipelineKey."} -u ".apiKey;
        $data = sendDeleteRequest($requestURL);
        return $data;
	}

	// Function to edit a Pipeline 
	function editPipeline($newName, $newDescription, $pipelineKey) {

		$inputData = array("name" => $newName,
					  	   "description" => $newDescription
			);

		$requestURL = baseURL."/pipelines/{".$pipelineKey."} -u ".apiKey;
        $data = sendPostRequest($inputData,$requestURL);
        return $data;
	}


	