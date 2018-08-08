<?php 
   session_start();
   
   session_destroy();
   
   header("Location: /cst336Final/login.php");
?>

