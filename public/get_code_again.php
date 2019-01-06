<?php
session_start();
require_once("../includes/database.php");

if(isset($_GET['email'])){
    $FindEmail = "SELECT * from users WHERE email = '{$_GET['email']}' ";
    $FindEmailResult = mysqli_query($connection, $FindEmail);
    $FindEmailRow = mysqli_fetch_assoc($FindEmailResult);
    
    $username   = $FindEmailRow['username'];
    $email      = $FindEmailRow['email'];
    $email_code = $FindEmailRow['email_activator'];

    mail($email, "Activate an account","Hello ".$username.", activate your account using following link:\n\n http://theme.uz/public/activation_page.php?email=".$email."&emailcode=".$email_code."");
    header("Location: ../public/index.php");

}

?>