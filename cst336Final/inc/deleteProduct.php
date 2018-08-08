<?php
deleteProduct();
function deleteProduct()
{
   include "dbConnection.php";
   $conn = getDBConnection();
   
   $sql = "DELETE FROM senators WHERE senId = :id";
   
   $res = new stdClass();
   $res->okay = "";
   
   try {
      $stmt = $conn->prepare($sql);
      $data = array(":id" => $_POST['id']);
      $stmt->execute($data);
      $res->okay = "okay";
   }

    catch(Exception $e) {
      $res->okay = "error";
   }

   echo json_encode($res);
}
?>