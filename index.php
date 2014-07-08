<?php

include_once 'src/PipelineMethods.php';
include_once 'src/GetTokenKeys.php';
include_once 'src/StageMethods.php';
include_once 'src/BoxMethods.php';


// Creating the Tests for Use Case that I need to solve.
//echo getAllBoxesFromPipeline(getPipelineKey('newProductDevelopment'));

function generateTimeStampInBox($pipelineName,$inputDate) {
    // Get the Stage Change Time Stamp
    $dataForBox = getSpecificBox(getBoxKey($pipelineName,$inputDate));
    $stageChangeDuration = $dataForBox['lastStageChangeTimestamp'];

    // Creating a new Box based on change Timestamp
    $data = createBox(getPipelineKey($pipelineName),date('Y-m-d H:i:s',$stageChangeDuration/1000));
    return $data;
}

// Function to get the Boxes Time Stamp Data as an Array. Working with the newProductDevelopment Pipeline
function getStageBoxesTimestampData($stageName) {

    $pipelineName = "newProductDevelopment";

    $stageData = json_decode(getSpecificStage(getPipelineKey($pipelineName),getStageKey($pipelineName,$stageName)),true);
    
}

 //print_r(getStageBoxesTimestampData("Test Stage"));






