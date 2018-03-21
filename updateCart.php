<?php 

session_start();
$id = $_POST['barang_id'];
$value = $_POST['value'];
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

$cart[$id]['quantity'] = $value;

$_SESSION['cart'] = $cart;

 ?>