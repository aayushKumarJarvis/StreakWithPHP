<?php

include 'StreakClient.php';
include 'PipelineMethods.php';
include 'BoxMethods.php';
include 'StageMethods.php';
include 'FieldMethods.php'

/* The pipeline, stage and field access require their individual keys. 
   This Class code aims at extracting each of the individual keys so to be used in method classes. 
*/

$pipelineObject = new PipelineMethods;
$boxObject = new BoxMethods;
$stageObject = new StageMethods;
$fieldObject = new FieldMethods;

public $errorMessage = "Sorry! Not Found"l

class GetTokenKeys {

	public function getPipelineKey($nameOfThePipeline) {

		$userPipelineKey = "";
		$userPipelines = json_decode($pipelineObject->getUserPipelines(),true);

		for($i=0; $i<count($userPipelines['name']);$i++) {
			if(strtolower($userPipelines[$i]['name']) == strtolower($nameOfThePipeline)) 
				$userPipelineKey = $userPipelines[$i]['pipelineKey'];
		}

		if($userPipelineKey)
			return $userPipelineKey;
		else 
			return $errorMessage;
	}

	public function getBoxKey($nameOfThePipeline, $nameOfTheBox) {

		$userPipelineKey = getPipelineKey($nameOfThePipeline);

		$userBoxKey = "";
		$userBoxes = json_decode($boxObject->getAllBoxesFromPipeline($userPipelineKey));

		for($i=0; $i<count($userBoxes['name']);$i++) {
			if(strtolower($userBoxes[$i]['name']) == strtolower($nameOfTheBox))
				$userBoxKey = $userBoxes[$i]['boxKey'];
		}

		if($userBoxKey)
			return $userBoxKey;
		else
			return $errorMessage;
	}

	public function getStageKey($nameOfThePipeline, $nameOfTheStage) {

		$userPipelineKey = getPipelineKey($nameOfThePipeline);

		$userStageKey = "";
		$userStages = json_decode($stageObject->lisAllStages($userPipelineKey));

		for($i=0; $i<count($userStages['name']);$i++) {
			if(strtolower($userStages[$i]['name']) == strtolower($nameOfTheStage))
				$userStageKey = $userStages[$i]['key'];
		}

		if($userStageKey)
			return $userStageKey;
		else 
			return $errorMessage;
	}

	public function getFieldKey($nameOfThePipeline, $nameOfTheField) {

		$userPipelineKey = getPipelineKey($nameOfThePipeline);

		$userFieldKey = "";
		$userFields = json_decode($fieldObject->listAllFields($userPipelineKey));

		for($i=0; $i<count($userFields['name']);$i++) {
			if(strtolower($userFields[$i]['name']) == strtolower($nameOfTheField))
				$userFieldKey = $userFields[$i]['key'];
		}

		if($userFieldKey)
			return $userFieldKey;
		else
			return $errorMessage;

	}
}