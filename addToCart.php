<?php 

session_start();
include_once("function/connection.php");
include_once("function/helper.php");

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

$id = $_GET['id'];

$query = $dbh->query("SELECT * FROM product WHERE productID = $id");

$row = $query->fetch(PDO::FETCH_OBJ);

$productName = $row->productName;
$productPrice = $row->productPrice;
$productID = $row->productID;

$cart[$productID] = array(
					"productName" => $productName,
					"productPrice" => $productPrice,
					"quantity" => 1
						);

$_SESSION['cart'] = $cart;

header("location:".$_SESSION['actual_link']);




 ?>