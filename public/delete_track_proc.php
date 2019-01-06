<?php 
    require_once("../includes/database.php");

    if(!isset($_SESSION['username'])){
        header("Location: ../public/index.php");
    }

    if(empty($_GET)){
        header("Location: ../public/profile.php");
    }
    else
    {
        $trackQuery = "DELETE FROM tracks WHERE username = '{$_SESSION["username"]}' AND track_name='{$_GET["track"]}'";
        $trackResult = mysqli_query($connection, $trackQuery);
        header("Location: ../public/delete_track.php");
    }
?>
