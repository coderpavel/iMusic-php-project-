<?php
 require_once("../includes/database.php");

$fileName = $_FILES["file1"]["name"];
$fileTmpLoc = $_FILES["file1"]["tmp_name"];
$fileType = $_FILES["file1"]["type"];
$fileSize = $_FILES["file1"]["size"];
$fileErrorMsg = $_FILES["file1"]["error"];
$username = $_SESSION['username'];

if(!empty($_SESSION)){
	$insert=mysql_query("insert into tracks (username, track_name, track_path) values('{$_SESSION['username']}', '{$fileName}' ,'../public/profile/$username/$fileName')");
}

if(!$fileTmpLoc) {
	echo "Error: please browse for a file before clicking the upload button.";
	exit();
} 

if(move_uploaded_file($fileTmpLoc, "../public/profile/".$_SESSION['username']."/$fileName")) {
	echo $fileName." uploading is complete";
	exit();
} else {
	echo "move_uploaded_file function failed";
}




?>