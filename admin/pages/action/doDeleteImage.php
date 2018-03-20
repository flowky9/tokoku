<?php

	include_once("../../function/connection.php");
	include_once("../../function/helper.php");
	
	$id = $_GET['id'];
	$productID = $_GET['productID'];
	$query = $dbh->query("DELETE FROM image_map WHERE imageID = $id AND productID = $productID");

	if($query){
		header("location:".URL."admin/index.php?page=update_product&id=".$productID);
	}

?>