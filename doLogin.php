<?php 

session_start();
include_once("function/connection.php");
include_once("function/helper.php");

$name = $_POST['email'];
$password = md5($_POST['password']);

$query = $dbh->query("SELECT * FROM user WHERE userName = '$name' AND userPassword = '$password' ");

if($query->rowCount()>0){
	$data = $query->fetch(PDO::FETCH_OBJ);

	$_SESSION['userID'] = $data->userId;

	header("location:".URL."admin");
}else {
	header("location:".URL."login.php?notif=failed");
}

 ?>