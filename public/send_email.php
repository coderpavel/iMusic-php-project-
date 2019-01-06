<?php
require_once("../includes/database.php");

if(isset($_POST['user_comm']) && isset($_POST['mail']) && isset($_POST['user_name']))
{
  $email = "9243031@gmail.com"
  $comment  = $_POST['user_comm'];
  $emailSender  = $_POST['mail'];
  $name     = $_POST['user_name'];

  mail($email, "From: ".$name.", email: " .$emailSender. " .","".$comment."");
}


header("Location: ../public/activation_page.php");

?>