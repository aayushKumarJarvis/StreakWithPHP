<?php

// Class Methods to calculate the custom excel formulae to be applied. 
// Fetch the value from a field 
// Compute the operations you want on it. 
// Append the result in anothe field

//NOTE: Let the user decide which fields he wants to 

include 'src/StreakClient.php';
include 'src/FieldMethods.php';
include 'src/GetTokenKeys.php';
include 'src/PipelineMethods.php';


$clientObject = new StreakClient;
$fieldObject = new FieldMethods;
$TokenKeys = new GetTokenkeys;
$pipelineObject = new PipelineMethods;

// Custom computation method
function calculateDateDifference($reportedDate, $resolvedDate) {
	$numberOfDays = date_diff($resolvedDate,$reportedDate);
	return $numberOfDays;
}

// To display the list of pipelines when user asks for it 
$pipelineObject->getUserPipelines


