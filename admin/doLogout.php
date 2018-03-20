<?php 

	include_once("function/connection.php");
	include_once("function/helper.php");
session_start();
session_unset($_SESSION['userID']);
session_destroy();

header("location:".URL."login.php?status=logout");

echo "asu";


 ?>