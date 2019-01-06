<?php
	require_once("../includes/database.php");

	$fileName = $_FILES["ava"]["name"];
	$fileTmpLoc = $_FILES["ava"]["tmp_name"];
	$fileType = $_FILES["ava"]["type"];
	$fileSize = $_FILES["ava"]["size"];
	$fileErrorMsg = $_FILES["ava"]["error"];

	if(!empty($_SESSION)){
		$UpdateAvatar = "UPDATE users SET image = '../public/profile/".$_SESSION['username']."/".$fileName."' WHERE username = '{$_SESSION['username']}' ";
	    $UpdateAvatarResult = mysqli_query($connection, $UpdateAvatar);
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