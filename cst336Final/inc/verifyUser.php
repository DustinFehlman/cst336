<?php
session_start();
loginCheck();
   
function loginCheck(){
//may need to change for your own heoku
    include 'dbConnection.php';
    $connect = getDBConnection();
    $sql = "SELECT * FROM admin
            WHERE username = :username
            AND password = :password";
    $stmt = $connect->prepare($sql);
    $data = array(":username" => $_POST['uname'], ":password" => sha1($_POST['psw']));
    $stmt->execute($data);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(isset($user['username'])){
        $_SESSION['username'] = $user['username'];
        $_SESSION['valid'] = "true";
        $_SESSION['username'] = 'admin';
        header('Location: /cst336Final/admin.php');
    } 
    else {
        $_SESSION['valid'] = "false";
        header('Location: /cst336Final/login.php');
    }
}
?>


