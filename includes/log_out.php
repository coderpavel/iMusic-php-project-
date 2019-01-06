<?php
session_start();
require_once("../includes/database.php");
session_destroy();
header("Location: ../public/index.php");
?>