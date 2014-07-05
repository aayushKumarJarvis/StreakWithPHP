<?php

include 'StreakClient.php';

/**************************************************************
/*					PIPELINE OPERATIONS						  *	
/**************************************************************/

class PipelineMethods {

// Will fetch the current user with the input API Key
	public function getCurrentUser() {
		$requestURL = $baseURL."/users/me -u".$apiKey;
		sendGetRequest($requestURL);
	}


	// Get all the pipelines for that user
	public function getUserPipelines() {
		$requestURL = $baseURL."/pipelines -u ".$apiKey;
		sendGetRequest($requestURL);
	}

	// Get Specific pipeline out of the all the pipelines 
	public function getSpecificPipeline($pipelineKey) {
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."} -u ".$apiKey;
		sendGetRequest($requestURL);
	}

	// Create a Pipeline based on user inputs
	public function createPipeline($name,$description) {

		$inputData = array("name" => $name,
					  "description" => $description
			);

		$requestURL = $baseURL."/pipelines -u ".$apiKey;
		sendPutRequest($inputData, $requestURL);
	}

	// Delete a Pipeline of the user
	public function deletePipeline($pipelineKey) {
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."} -u ".$apiKey;
		sendDeleteRequest($requestURL);
	}

	// Function to edit a Pipeline 
	public function editPipeline($newName, $newDescription, $pipelineKey) {

		$inputData = array("name" => $newName,
					  	   "description" => $newDescription
			);

		$requestURL = $baseURL."/pipelines/{".$pipelineKey."} -u ".$apiKey;
		sendPostRequest($inputData,$requestURL);
	}
}

	