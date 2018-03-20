<?php 

	include_once("../../function/connection.php");
	include_once("../../function/helper.php");

	$categoryName   = $_POST['name'];
	$categoryParent = $_POST['subcategory'];
	$id = $_POST['id'];

	if($categoryName == ""){
		header("location:".URL."admin/index.php?page=list_category&notif=failed");
	}else {
		$query = $dbh->query("UPDATE category SET categoryName = '$categoryName', categoryParent = '$categoryParent' WHERE categoryID = $id ");

		if($query){
			header("location:".URL."admin/index.php?page=list_category&id=".$id."&notif=success");
		}else {
			echo "Gagal menginput category <br>";
			print_r($dbh->errorInfo());
		}

	}

	


 ?>