<?php 
require_once("../includes/database.php");

if(isset($_POST['track_link']))
{
	$trackSelect = "SELECT * FROM tracks WHERE track_path = '{$_POST['track_link']}'";
	$trackResult = mysqli_query($connection, $trackSelect);
	$trackRow = mysqli_fetch_assoc($trackResult);
	$current_view = $trackRow['view']+1;

	$track_link = $_POST['track_link'];
	$trackQuery = "UPDATE tracks SET view = $current_view WHERE track_path = '{$_POST['track_link']}'";
    $trackUpdated = mysqli_query($connection, $trackQuery);

 

	if(isset($_POST['track_link']))	{
	?>
		<span><?php echo $current_view?></span>
	<?php
	}
exit;
}  
?>
