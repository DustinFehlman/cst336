<?php

    function checkLogInAttempt(){
        if($_SESSION['valid'] == "false") {
           printError();
        }
        $_SESSION['valid'] = "null";
    }
    
    function printError(){
        echo "<h4 class='error-font'>Incorrect username / password. Please try again.</h4>";
    }
    
?>