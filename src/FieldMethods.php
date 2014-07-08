<?php

include_once 'StreakClient.php';

/**************************************************************
/*					   FIELD OPERATIONS						  *	
/**************************************************************/

	//List all the Fields in a pipeline
	function listAllFields($pipelineKey) {
		$requestURL =baseURL."/pipelines/".$pipelineKey."/fields";
		$data = sendGetRequest($requestURL);
        return $data;
	}

	//Specific Fields in a pipeline 
	function getSpecificField($pipelineKey, $fieldKey) {
		$requestURL = baseURL."/pipelines/".$pipelineKey."/fields/{".$fieldKey."}";
		$data = sendGetRequest($requestURL);
        return $data;
	}

	//Create Field in a pipeline
	function createField($pipelineKey,$fieldName,$textInput) {
		$inputData = array("name" => $fieldName,
						   "type" => $textInput
			);
		$requestURL = baseURL."/pipelines/".$pipelineKey."/fields";
		$data = sendPutRequest($inputData,$requestURL);
        return $data;
	}

	//Delete Field in Pipeline
	function deleteField($pipelineKey, $fieldKey) {
		$requestURL = baseURL."/pipelines/".$pipelineKey."/fields/".$fieldKey;
		$data = sendDeleteRequest($requestURL);
        return $data;
	}

	//Edit a Field 
	function editField($pipelineKey, $fieldKey, $fieldName) {
		$inputData = array("name"=>$fieldName);
		$requestURL = baseURL."/pipelines/".$pipelineKey."/fields/".$fieldKey;
		$data = sendPostRequest($inputData, $requestURL);
        return $data;
	}
