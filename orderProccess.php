<?php 

session_start();
date_default_timezone_set('Asia/Jakarta');
require_once("function/helper.php");
require_once("function/connection.php");

if(!isset($_SESSION['userID'])){
	header("location:".URL."admin/");
}else {
	$userID   = $_SESSION['userID'];
	$name     = $_POST['name'];
	$email    = $_POST['email'];
	$phone    = $_POST['phone'];
	$city     = $_POST['city'];
	$district = $_POST['district'];
	$address  = $_POST['address'];
	$date     = date('Y-m-d');
	$status   = 0;
	echo $date;
	
	$getKotaID = $dbh->query("SELECT kotaID FROM city_data WHERE kecamatan = '$district' ");
	$rowKotaID = $getKotaID->fetch(PDO::FETCH_OBJ);
	$kotaID    = $rowKotaID->kotaID;

	$queryOrder = $dbh->query("INSERT INTO order_data VALUES 
							('','$kotaID','$userID','$name','$email','$phone','$address','$date','$status')	");

	if($queryOrder){
		$lasInsertID = $dbh->lastInsertId();
		$cart        = $_SESSION['cart'] ;

		foreach ($cart as $key => $value) {
			$productID       = $key;
			$productPrice    = $value['productPrice'];
			$productQuantity = $value['quantity'];

			$queryOrderDetail = $dbh->query("INSERT INTO detail_order VALUES 
										    ('$lasInsertID','$productID','$productQuantity','$productPrice') 	");
		}
	}

	header("location:".URL."admin/index.php?order=success");

}




 ?>