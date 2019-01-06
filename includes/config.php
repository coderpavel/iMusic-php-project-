<?php
//1.Create a db connection
defined("DB_SERVER") ? null : define("DB_SERVER", "localhost");
defined("DB_USER") 	 ? null : define("DB_USER", "inha");
defined("DB_PASS")	 ? null : define("DB_PASS", "2601532");
defined("DB_NAME")	 ? null : define("DB_NAME", "imusic");

$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
//Test if connection succeed
if(mysqli_connect_errno())
{
	die("Database connection failed: ".
		mysqli_connect_error().
		"(" . mysqli_connect_errno(). ")"
	);
}

?>