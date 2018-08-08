<?php

   //May have to chnage to connect.php for you own service
   include "dbConnection.php";

   if(isset($_POST['function'])) {
      $conn = getDBConnection();
      if($_POST['function'] == 'avgProduct') {
         getAvgProductPrice();  
      }
      else if($_POST['function'] == 'partyCount') {
         getPartyCount();  
      }
      else if($_POST['function'] == 'mostExp') {
        getMostExpensiveSen();  
      }
   }
   
   //gets the avg price of  all senators
   //returns just the average, not the array
   function getAvgProductPrice()
   {
       global $conn;
       
       $sql = "SELECT AVG(price) as avg FROM senators";
       $stmt = $conn->prepare($sql);
       $stmt->execute();
       $avg = $stmt->fetch(PDO::FETCH_ASSOC);
       
       $res = new stdClass();
       $res->avgPrice = $avg[avg];
       echo json_encode($res);
   }
   
   //gets the party count for each party- not fully tested-is it getting all the parties
   //returns the array
   function getPartyCount()
   {
       global $conn;
       
       $sql = "SELECT party, COUNT(senId) as count 
               FROM senators JOIN party_affiliation
                   ON senators.partyId = party_affiliation.partyId
               GROUP BY party";
       $stmt = $conn->prepare($sql);
       $stmt->execute();
       $partyCnt = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
       echo json_encode($partyCnt);
   }
   
   //calculates which senator is most expensive
   //returns the array
   function getMostExpensiveSen()
   {
       global $conn;
       
       $sql = "SELECT sen_firstName, sen_lastName, MAX(price) as max FROM senators";
       $stmt = $conn->prepare($sql);
       $stmt->execute();
       $max = $stmt->fetch(PDO::FETCH_ASSOC);

       echo json_encode($max);
   }
?>

