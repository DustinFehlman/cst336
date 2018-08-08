<?php

function getDBConnection($dbname = 'heroku_35ebda6bd9915d8'){
    $host = 'us-cdbr-iron-east-04.cleardb.net';
    $username = 'bfaf3ab5961d91';
    $passowrd = '52958950';
    
    $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $passowrd);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>