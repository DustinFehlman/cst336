<?php
showAllProducts();
function showAllProducts()
{
   //You may have to update this to connect.php depending on your heroku setup. 
   include "dbConnection.php";
   $conn = getDBConnection();
   
   $sql = "SELECT senId, sen_firstName, sen_lastName, state, imgURL, price, party
           FROM senators JOIN party_affiliation ON senators.partyId = party_affiliation.partyId";
           
   
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

   echo json_encode($products);
}
?>