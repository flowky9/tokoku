<?php 
	
		include_once("../../function/connection.php");
		include_once("../../function/helper.php");

		$categoryID = $_GET['id'];
		$query = $dbh->query("DELETE FROM category WHERE categoryID = $categoryID ");

		if($query){
			header("location:".URL."admin/index.php?page=list_category");
		}else {
			echo "Error";
		}


 ?>