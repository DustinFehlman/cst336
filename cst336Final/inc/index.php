<?php
   session_start();
   
   include "functions.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test </title>
    </head>
    <body>
        <h3>Usernames: user_1 and user_2 Password: s3cr3t</h3>
        <form method = "POST" action="verifyUser.php">
            <input type="text" name="username" placeholder="Username"/><br />
            <input type="password" name="password" placeholder="Password"/><br />
            <input type="submit" name="submit" value="Login"/>
        </form>
        <?php
          getPartyCount();
         if(isset($_SESSION['username']))
         {
             echo "You are logged in as " . $_SESSION['username'];
         }
    ?>
    </body>
</html>