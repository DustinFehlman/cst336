<?php
//Please separate the politician-name input field into 2 separate input fields- first name and last name
//user can enter the name in uppercase or lowercase-the string is converted to match the db here
//Please change the values from party to be the party ID's instead of letters

   include "connect.php";
   $conn = getDBConnection();
     
   $namedParameters = array();
   
   $sql = "SELECT senId, sen_firstName, sen_lastName, state, imgURL, price, party
           FROM senators JOIN party_affiliation ON senators.partyId = party_affiliation.partyId
           WHERE 1";
           
    if(!empty($_POST['firstName']))
    {
        $sql .= " AND sen_firstName = :firstName";
        $namedParameters[':firstName'] = ucfirst(strtolower($_POST['firstName']));
    }
    
    if(!empty($_POST['lastName']))
    {
        $sql .= " AND sen_lastName = :lastName";
        $namedParameters[':lastName'] = ucfirst(strtolower($_POST['lastName']));
    }
    
    if(!empty($_POST['state']))
    {
        $sql .= " AND state = :state";
        $namedParameters[':state'] = $_POST['state'];
    }
    
    if(!empty($_POST['party']))
    {
        $sql .= " AND senators.partyId = :party";
        $namedParameters[':party'] = $_POST['party']; //assumes that the partyId will be stored here
    }
    
   
   $stmt = $conn->prepare($sql);
   $stmt->execute($namedParameters);
   $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

   if(empty($products))
   {
       $products = new stdClass();
       $products->result = "empty";
   }
   
   echo json_encode($products);

?>