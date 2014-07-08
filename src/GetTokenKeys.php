<?php

include_once 'StreakClient.php';
include_once 'PipelineMethods.php';
include_once 'BoxMethods.php';
include_once 'StageMethods.php';
include_once 'FieldMethods.php';

/* The pipeline, stage and field access require their individual keys. 
   This Class code aims at extracting each of the individual keys so to be used in method classes. 
*/
    define("errorMessage","Sorry! Not Found");

	function getPipelineKey($nameOfThePipeline) {

		$userPipelineKey = "";
		$userPipelines = json_decode(getUserPipelines());

        for($i=0; $i<count($userPipelines);$i++) {
			if(strtolower($userPipelines[$i]->name) == strtolower($nameOfThePipeline)) {
               $userPipelineKey = $userPipelines[$i]->pipelineKey;
            }
		}

		if($userPipelineKey)
			return $userPipelineKey;
		else 
			return errorMessage;
	}

	function getBoxKey($nameOfThePipeline, $nameOfTheBox) {

		$userPipelineKey = getPipelineKey($nameOfThePipeline);

		$userBoxKey = "";
		$userBoxes = json_decode(getAllBoxesFromPipeline($userPipelineKey),true);
        for($i=0; $i<count($userBoxes);$i++) {
            if(strtolower($userBoxes[$i]['name']) == strtolower($nameOfTheBox)) {
                $userBoxKey = $userBoxes[$i]['boxKey'];
            }
        }
		if($userBoxKey)
			return $userBoxKey;
		else
			return errorMessage;
	}

	function getStageKey($nameOfThePipeline, $nameOfTheStage) {

        // Seems this one is a bit tight.

       	$userPipelineKey = getPipelineKey($nameOfThePipeline);

		$userStageKey = "";
		$userStages = json_decode(listAllStages($userPipelineKey),true);

        $counter=count($userStages);
        while($counter!=0) {
            if(strtolower($userStages[($counter+5000)]['name']) == strtolower($nameOfTheStage))
                $userStageKey = $userStages[($counter+5000)]['key'];
            $counter = $counter-1;
        }
       	if($userStageKey)
			return $userStageKey;
		else 
			return errorMessage;
	}

	function getFieldKey($nameOfThePipeline, $nameOfTheField) {

		$userPipelineKey = getPipelineKey($nameOfThePipeline);

		$userFieldKey = "";
		$userFields = json_decode(listAllFields($userPipelineKey));

		for($i=0; $i<count($userFields);$i++) {
			if(strtolower($userFields[$i]->name) == strtolower($nameOfTheField))
				$userFieldKey = $userFields[$i]->key;
		}

		if($userFieldKey)
			return $userFieldKey;
		else
			return errorMessage;

	}

