<?php

include_once 'StreakClient.php';

/**************************************************************
/*					   STAGE OPERATIONS						  *	
/**************************************************************/


	//List all the stages in a pipeline
	function listAllStages($pipelineKey) {
		$requestURL = baseURL."/pipelines/".$pipelineKey."/stages";
		$data = sendGetRequest($requestURL);
        return $data;
	}

	//Specific Stages in a pipeline 
	function getSpecificStage($pipelineKey, $stageKey) {
		$requestURL = baseURL."/pipelines/".$pipelineKey."/stages/".$stageKey;
		$data = sendGetRequest($requestURL);
        return $data;
	}

	//Create Stage in a pipeline
	function createStage($pipelineKey,$stageName) {
		$inputData = array("name" => $stageName);
		$requestURL = baseURL."/pipelines/".$pipelineKey."/stages";
		$data = sendPutRequest($inputData,$requestURL);
        return $data;
	}

	//Delete Stage in Pipeline
	function deleteStage($pipelineKey, $stageKey) {
		$requestURL = baseURL."/pipelines/".$pipelineKey."/stages/".$stageKey."";
		$data = sendDeleteRequest($requestURL);
        return $data;
	}

	//Edit a Pipeline 
	function editStage($pipelineKey, $stageKey, $stageName) {
		$inputData = array("name"=>$stageName);
		$requestURL = baseURL."/pipelines/".$pipelineKey."/stages/".$stageKey."";
		$data = sendPostRequest($inputData, $requestURL);
        return $data;
	}

