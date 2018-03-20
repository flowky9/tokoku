<?php 

	include_once("../../function/connection.php");
	include_once("../../function/helper.php");

	$productCategory    = $_POST['category'];
	$productName        = $_POST['name'];
	$productPrice       = $_POST['price'];
	$productDescription = $_POST['description'];
	$productStock       = $_POST['stock'];
	$status             = 1;

if($productCategory == "" OR $productName ==""){

	header("location:".URL."admin/index.php?page=input_product&notif=failed");
}else {

	//query insert table product
	$queryProduct = $dbh->query("INSERT INTO product VALUES (
												'','','$productName','$productPrice','$productDescription','','$productStock','$status')");
	$categoryCount = count($productCategory);

	$productId = $dbh->lastInsertId();

	for($x=0;$x<$categoryCount;$x++){
		$categoryMap = $_POST['category'][$x];

		$dbh->query("INSERT INTO category_map VALUES ('','$categoryMap','$productId') ");
	}

	//Jika query insert ke table product berhasil maka dilanjutkan insert iamge
	if($queryProduct){
		//mengambil nilai ID query terakhir
		// $productId = $dbh->lastInsertId();
		//menghitung jumlah file di dalam array
		$fileCount = count($_FILES['image']['name']);
		
		//proses upload file ke folder lokal
		for($i=0;$i<$fileCount;$i++){
			$tmpFile = $_FILES['image']['tmp_name'][$i];

			if($tmpFile != ""){
				$newFilePath = "../../../img/". replace_words($_FILES['image']['name'][$i]);

				if(move_uploaded_file($tmpFile, $newFilePath)){
					$fileName = replace_words($_FILES['image']['name'][$i]);

					//quert insert ke table image
					$queryImage = $dbh->query("INSERT INTO image_map VALUES ('','$productId','$fileName')");
				}else {
					echo "Ada kesalahan saat upload product <br>";
					print_r($dbh->errorInfo());
				}

				
			}
		}

		header("location:".URL."admin/index.php?page=list_product&notif=success");
	}else {
		echo "Ada kesalahan saat input product <br>";
		print_r($dbh->errorInfo());
	}

}

	


 ?>