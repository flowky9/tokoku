<?php 

	
	

try {
// buat koneksi dengan database
$dbh = new PDO("mysql:host=localhost;dbname=tokoku","root","");
 
// set error mode
$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 
}
catch (PDOException $e) {
// tampilkan pesan kesalahan jika koneksi gagal
print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
die();
}

 ?>