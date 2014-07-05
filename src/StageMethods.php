<?php

include 'StreakClient.php';

/**************************************************************
/*					   STAGE OPERATIONS						  *	
/**************************************************************/

class StageMethods {

	//List all the stages in a pipeline
	public function listAllStages($pipelineKey) {
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."}/stages -u ".$apiKey
		sendGetRequest($requestURL)
	}

	//Specific Stages in a pipeline 
	public function getSpecificStage($pipelineKey, $stageKey) {
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."}/stages/{".$stageKey."} -u ".$apiKey
		sendGetRequest($requestURL)
	}

	//Create Stage in a pipeline
	public function createStage($pipelineKey,$stageName) {
		$inputData = array("name" => $stageName);
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."/stages -u ".$apiKey
		sendPutRequest($inputData,$requestURL)
	}

	//Delete Stage in Pipeline
	public function deleteStage($pipelineKey, $stageKey) {
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."/stages/{".$stageKey."} -u ".$apiKey
		sendDeleteRequest($requestURL)
	}

	//Edit a Pipeline 
	public function editStage($pipelineKey, $stageKey, $stageName) {
		$inputData = array("name"=>$stageName);
		$requestURL = $baseURL."/pipelines{".$pipelineKey."}/stages/{".$stageKey."}"
		sendPostRequest($inputData, $requestURL)
	}
}
