<?php 

session_start();
require_once("function/helper.php");
require_once("function/connection.php");

$id = $_GET['id'];
$cart = $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

unset($cart[$id]);

$_SESSION['cart'] = $cart;

header("location:".URL."index.php?page=cart&notif=delete_cart_success");


 ?>