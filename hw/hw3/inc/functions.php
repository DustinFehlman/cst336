<?php
function showErrors(){
    if(isset($_SESSION["errors"])){
        echo $_SESSION["errors"];
    }
}

function displayResult(){
    if(isset($_SESSION["applicant"])){
        echo $_SESSION["applicant"]['assementRes'];
    }
}
function displayStates(){
    $states = array( 
		"AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC",  
    "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA",  
    "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE",  
    "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC",  
    "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY");
    $lastStateInput = getStateLastInput();
    foreach ($states as $state){
        if($state == $lastStateInput){
            echo "<option value='".$state."'selected>" . $state . "</option>";
        }else{
            echo "<option value='".$state."'>" . $state . "</option>";
        }
    }
}

function getGPAYesLastInput(){
    if(isset($_SESSION["applicant"])){
        if($_SESSION["applicant"]['gpaStanding'] == 'yes'){
            echo "checked";
        }
        else{
            echo "";
        }
    }
}

function getGPANoLastInput(){
    if(isset($_SESSION["applicant"])){
        if($_SESSION["applicant"]['gpaStanding'] == 'no'){
            echo "checked";
        }
        else{
            echo " ";
        }
    }
}

function getCST231LastInput(){
    if(isset($_SESSION["applicant"])){
        if($_SESSION["applicant"]['takenCST231'] != null){
            echo "checked";
        }
        else{
            echo  " ";
        }
    }
}

function getCST238LastInput(){
    if(isset($_SESSION["applicant"])){
        if($_SESSION["applicant"]['takenCST238'] != null){
            echo "checked";
        }
        else{
            echo  " ";
        }
    }
}

function getMATH130LastInput(){
    if(isset($_SESSION["applicant"])){
        if($_SESSION["applicant"]['takenMATH130'] != null){
            echo "checked";
        }
        else{
            echo  " ";
        }
    }
}

function getCreditLastInput(){
    if(isset($_SESSION["applicant"])){
        if($_SESSION["applicant"]['credits'] != null){
            echo $_SESSION["applicant"]['credits'];
        }
        else{
            echo  "0";
        }
    }
}

function getStateLastInput(){
    if(isset($_SESSION["applicant"])){
        if($_SESSION["applicant"]['state'] != null){
            return $_SESSION["applicant"]['state'];
        }
        else{
            return "AK";
        }
    }
}
?>