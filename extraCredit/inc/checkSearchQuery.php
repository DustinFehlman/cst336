<?php
   include "dbConnection.php";
   $searchText = strtolower($_POST["searchText"]);
   $res = new stdClass();
   $res->count = null;
   $res->status = null;
   $res->error = null;
   
   if($searchText === "" || $searchText === " "){
      $res->status = "error";
      $res->error = "Empty string as search text";
      echo json_encode($res);
   }else{
      $doesQueryExist = getIDByText($searchText);
      if(sizeof($doesQueryExist) > 0){
         $existingQueryID = $doesQueryExist[0]['id'];
         updateQuery($existingQueryID);
         $queryCount = getQueryInfoByID($existingQueryID);
         $res -> count = $queryCount[0]['query_count'];
         $res -> status = "success";
      }else{
         insertNewQuery($searchText);
         $res->count = 1;
         $res -> status = "success";
      }
      echo json_encode($res);
   }
   
   function getIDByText($searchText){
       $conn = getDBConnection();
       $queryCheckResult = "SELECT id FROM movie_searches WHERE query_text = '".$searchText."'";
       $stmt = $conn->prepare($queryCheckResult);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   
   function getQueryInfoByID($id){
       $conn = getDBConnection();
       $queryCheckResult = "SELECT query_count FROM movie_searches WHERE id = ".$id;
       $stmt = $conn->prepare($queryCheckResult);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   
   function insertNewQuery($searchText){
       $conn = getDBConnection();
       $queryCheckResult = "INSERT INTO movie_searches (query_text, query_count) VALUES ('".$searchText."',1)";
       $stmt = $conn->prepare($queryCheckResult);
       $stmt->execute();
   }
   
   function updateQuery($queryID){
       $conn = getDBConnection();
       $queryCheckResult = "UPDATE movie_searches SET query_count = query_count + 1 WHERE id = ".$queryID;
       $stmt = $conn->prepare($queryCheckResult);
       $stmt->execute();
   }
   
?>