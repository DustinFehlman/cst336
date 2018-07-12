<?php
    session_start();
    session_unset(); 
    $csApplicant = array(
    "gpaStanding" => null,
    "takenCST231" => null,
    "takenCST238"=> null,
    "takenMATH130" => null,
    "credits" => null,
    "state" => null,
    "assementRes" => null
  );
    
    $states = array( 
		"AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC",  
    "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA",  
    "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE",  
    "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC",  
    "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY");
    
    if(isset($_GET['gpa'])){
      $gpa = $_GET['gpa'];
      if($gpa == 'yes' || $gpa == "no"){
        $csApplicant['gpaStanding'] = $gpa;
      }
    }else{
        $_SESSION["errors"] .= "- Please select a GPA option.<br>";
    }
    
    
    //echo "dadsdsadsads";
    
    if(isset($_GET['cst231'])){
      $cst231 = $_GET['cst231'];
      if($cst231 == 'cst231')
        $csApplicant['takenCST231'] = $cst231;
      else{
        $_SESSION["errors"] .= "- Please enter a valid course number.<br>";
      }
    }
    
    if(isset($_GET['cst238'])){
     $cst238 = $_GET['cst238'];
      if($cst238 == 'cst238')
        $csApplicant['takenCST238'] = $cst238;
      else{
        $_SESSION["errors"] .= "- Please enter a valid course number.<br>";
      }
    }
    
    if(isset($_GET['math130'])){
     $math130 = $_GET['math130'];
      if($math130 == 'math130')
        $csApplicant['takenMATH130'] = $math130;
      else{
        $_SESSION["errors"] .= "- Please enter a valid course number.<br>";
      }
    }
    
    if(isset($_GET['credits'])){
      $credits = $_GET['credits'];
      if($credits >= 0 && $credits <= 120){
        $csApplicant['credits'] = $credits;
      } else{
        $_SESSION["errors"] .= "- Please enter a valid amount of credits.<br>";
      }
    }
    
    if(isset($_GET['state'])){
      $state = $_GET['state'];
      $match = false;
      for($x = 0; $x < count($states); $x++){
        if($state == $states[$x]){
          $match = true;
        }
      }
      if($match == true){
         $csApplicant['state'] = $state;
      }
      else{
        $_SESSION["errors"] .= "- Please enter a valid state.<br>";
      }
    }else{
        $_SESSION["errors"] .= "- Please select a state.<br>";
    }
    
    if(strlen($_SESSION["errors"]) > 0){
      reloadPage();
    } else{
      $csApplicant = buildResponse($csApplicant);
      $_SESSION['applicant'] = $csApplicant;
      reloadPage();
    }
    
    function reloadPage(){
      header("Location: ../index.php" );
      exit();
    }
    
    function buildResponse($csApplicant){
      $responseArr = array();
      $minUnits = 60;
      $restrictedStates = array("AK", "DE", "IN", "IA", "KS", "KY", "LA",  "MN",
      "NH", "NM", "NC", "OH", "OR", "UT");
      $isReady = true;
      $lameState;
     
      array_push($responseArr, "");
      if($csApplicant['gpaStanding'] == "yes"){
        array_push($responseArr, "- Great job having a GPA at or above 2.0!");
      }
      else{
        $isReady = false;
        array_push($responseArr, "- Please get your GPA at or above 2.0 before applying.");
      }
      
      if($csApplicant['takenCST231'] != null){
        array_push($responseArr, "- Great job taking CST231!");
      }
      else{
        $isReady = false;
        array_push($responseArr, "- Please take CST231 before applying.");
      }
      
      if($csApplicant['takenCST238'] != null){
        array_push($responseArr, "- Great job taking CST238!");
      }
      else{
        $isReady = false;
        array_push($responseArr, "- Please take CST238 before applying.");
      }
      
      if($csApplicant['takenMATH130'] != null){
        array_push($responseArr, "- Great job taking MATH130!");
      }
      else{
        $isReady = false;
        array_push($responseArr, "- Please take MATH130 before applying.");
      }
      
      if($csApplicant['credits'] >= $minUnits){
        array_push($responseArr, "- Great job having the minimum required credits of 60!");
      }
      else{
        $isReady = false;
        array_push($responseArr, "- Please obtain the minimum required credits of 60 before applying.");
      }
      
      for($x=0; $x < count($restrictedStates); $x++){
        if($csApplicant['state'] == $restrictedStates[$x]){
          $lameState = true;
        }
      }
      
      if($lameState != true){
        array_push($responseArr, "- Great job living in a state that allows us to teach you!");
      } else{
        $isReady = false;
        array_push($responseArr, "- We are not allowed to teach in your state. Please move before applying.");
      }
      
      if($isReady == true){
        $responseArr[0] .= "Amazing! You are ready to apply to the CS Online at CSUMB! Please 
        view our assessment below:";
      }
      else{
        $responseArr[0] .= "Sorry! You are not quite ready to apply to the CS Online at CSUMB. Please 
        view our assessment below:";
      }
      
      for($x = 0; $x < count($responseArr); $x++){
        $csApplicant['assementRes'] .= $responseArr[$x] . "<br>";
      }
      
      return $csApplicant;
    }
?>