<?php 

	include_once("../../function/connection.php");
	include_once("../../function/helper.php");

	$categoryName = $_POST['name'];
	$categoryParent = $_POST['subcategory'];

	if($categoryName == ""){
		header("location:".URL."admin/index.php?page=input_category&notif=failed");
	}else {
		$query = $dbh->query("INSERT INTO category VALUES ('','$categoryName','$categoryParent')");

		if($query){
			header("location:".URL."admin/index.php?page=input_category&notif=success");
		}else {
			echo "Gagal menginput category <br>";
			print_r($dbh->errorInfo());
		}

	}

	


 ?>