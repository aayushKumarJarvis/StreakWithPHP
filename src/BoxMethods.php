<?php

include 'StreakClient.php';

/**************************************************************
/*					   BOX OPERATIONS						  *	
/**************************************************************/


	//Function to List all Boxes a user has access to 
	function getBoxes() {
		$requestURL = baseURL."/boxes -u".apiKey;
		$data = sendGetRequest($requestURL);
        return $data;
	}

	//Function to list all boxes in a pipeline
	function getAllBoxesFromPipeline($pipelineKey) {
		$requestURL = baseURL."/pipelines/{".$pipelineKey."}/boxes -u".apiKey;
		$data = sendGetRequest($requestURL);
        return $data;
	}

	//Function to get a specific box 
	function getSpecificBox($boxKey) {
		$requestURL = baseURL."/boxes{".$boxKey."} -u".apiKey;
		$data = sendGetRequest($requestURL);
        return $data;
	}

	//Function to create a box
	function createBox($pipelineKey, $newBox) {
		$inputData = array("name" => $newBox);
		$requestURL = baseURL."/pipelines/{".$pipelineKey."}/boxes -u ".apiKey;
		$data = sendPutRequest($inputData,$requestURL);
        return $data;
	}

	//Function to Delete Box 
    function deleteBox($boxKey) {
		$requestURL = baseURL."/boxes/{".$boxKey."} -u ".apiKey;
		$data = sendDeleteRequest($requestURL);
        return $data;
	}

	//Function to edit a box
	function editBox($boxKey,$boxName,$boxNotes,$stageKey) {
		$inputData = array("name" => $boxName,
						   "notes" => $boxNotes,
						   "stageKey" => $stageKey
			);

		$requestURL = baseURL."/boxes{".$boxKey."} -u ".apiKey;
		$data = sendPostRequest($inputData,$requestURL);
        return $data;
	}



	