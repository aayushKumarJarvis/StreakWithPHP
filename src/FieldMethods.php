<?php

include 'StreakClient.php';

/**************************************************************
/*					   FIELD OPERATIONS						  *	
/**************************************************************/

class FieldMethods {

	//List all the Fields in a pipeline
	public function listAllFields($pipelineKey) {
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."}/fields -u ".$apiKey
		sendGetRequest($requestURL)
	}

	//Specific Fields in a pipeline 
	public function getSpecificField($pipelineKey, $fieldKey) {
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."}/fields/{".$fieldKey."} -u ".$apiKey
		sendGetRequest($requestURL)
	}

	//Create Field in a pipeline
	public function createField($pipelineKey,$fieldName,$textInput) {
		$inputData = array("name" => $stageName,
						   "type" => $textInput
			);
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."/fields -u ".$apiKey
		sendPutRequest($inputData,$requestURL)
	}

	//Delete Field in Pipeline
	public function deleteField($pipelineKey, $fieldKey) {
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."/fields/{".$fieldKey."} -u ".$apiKey
		sendDeleteRequest($requestURL)
	}

	//Edit a Field 
	public function editField($pipelineKey, $fieldKey, $fieldName) {
		$inputData = array("name"=>$fieldName);
		$requestURL = $baseURL."/pipelines{".$pipelineKey."}/fields/{".$filedKey."}"
		sendPostRequest($inputData, $requestURL)
	}
}