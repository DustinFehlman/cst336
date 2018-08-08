<?php
   updateProduct();
   function updateProduct()
   {
      //TODO: You may need to chnade to
      include "dbConnection.php";
      $conn = getDBConnection();
      
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $state = $_POST['state'];
      $partyId = $_POST['partyId'];
      $price = $_POST['price'];
      $id = $_POST['id'];
      $imgURL = $_POST['imgURL'];
    
      $sql = "UPDATE senators
              SET sen_firstName = :firstName, sen_lastName = :lastName, state = :state,
                  partyId = :partyId, imgURL = :imgURL, price = :price
              WHERE senId = :id";
                  
      $namedParameters = array();
      $namedParameters[':firstName'] = $firstName;
      $namedParameters[':lastName'] = $lastName;
      $namedParameters[':state'] = $state;
      $namedParameters[':partyId'] = $partyId;
      $namedParameters[':price'] = $price;
      $namedParameters[':id'] = $id;
      $namedParameters[':imgURL'] = $imgURL;
      
      $res = new stdClass();
      $res->okay = "";
      
      try{
         $statement = $conn->prepare($sql);
         $statement->execute($namedParameters);
         $res->okay = "okay";
       }
      
      catch(Exception $e) {
         $res->okay = "error";
         $res->exeception = $e;
      }

      echo json_encode($res);
   }
?>

