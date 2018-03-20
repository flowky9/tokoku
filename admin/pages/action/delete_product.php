<?php 
	
		include_once("../../function/connection.php");
		include_once("../../function/helper.php");

		$id = $_GET['id'];
		$query = $dbh->query("DELETE FROM product WHERE productID = $id ");

		if($query){
			header("location:".URL."admin/index.php?page=list_product&notif=success");
		}else {
			echo "Error";
		}


 ?>