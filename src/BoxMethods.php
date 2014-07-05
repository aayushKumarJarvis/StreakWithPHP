<?php

include 'StreakClient.php';

/**************************************************************
/*					   BOX OPERATIONS						  *	
/**************************************************************/

class BoxMethods {

	//Function to List all Boxes a user has access to 
	public function getBoxes() {
		$requestURL = $baseURL."/boxes -u".$apiKey;
		sendGetRequest($requestURL);
	}

	//Function to list all boxes in a pipeline
	public function getAllBoxesFromPipeline($pipelineKey) {
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."}/boxes -u".$apiKey;
		sendGetRequest($requestURL);
	}

	//Function to get a specific box 
	public function getSpecificBox($boxKey) {
		$requestURL = $baseURL."/boxes{".$boxKey."} -u".$apiKey;
		sendGetRequest($requestURL);
	}

	//Function to create a box
	public function createBox($pipelineKey, $newBox) {
		$inputData = array("name" => $newBox);
		$requestURL = $baseURL."/pipelines/{".$pipelineKey."}/boxes -u ".$apiKey;
		sendPutRequest($inputData,$requestURL);
	}

	//Function to Delete Box 
	public function deleteBox($boxKey) {
		$requestURL = $baseURL."/boxes/{".$boxKey."} -u ".$apiKey;
		sendDeleteRequest($requestURL);
	}

	//Function to edit a box
	public function editBox($boxKey,$boxName,$boxNotes,$stageKey) {
		$inputData = array("name" => $boxName,
						   "notes" => $boxNotes,
						   "stageKey" => $stageKey
			);

		$requestURL = $baseURL."/boxes{".$boxKey."} -u ".$apiKey
		sendPostRequest($inputData,$url);
	}
}


	