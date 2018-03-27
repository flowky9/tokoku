<?php

define("URL", "http://localhost/tokoku2/");

	function rupiah($nilai = 0){
		$string = "Rp ".number_format($nilai,0,".",".");
		return $string;
	}

	function tanggal_indonesia($date){
	 	$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	 	$bulan = array("Januari","Februari","Mart","April","Juni","Juli","Agustus","September","Oktober","November","Desember");
	 	$thn = substr($date,0,4);
		$bln = substr($date,5,2);
		$tgl = substr($date,8,2);
		$waktu = substr($date,11,5);
		$hr = date("w",strtotime($date));

		$result = $hari[$hr].", ". $tgl." ".$bulan[(int)$bln-1].' '.$thn.' '.$waktu.' WIB';
		return $result;
 	}

 	function admin_only($module,$level){
 		if($level != "superadmin"){
			$array_pages = array("kategori","barang","kota","user","banner");
			if(in_array($module, $array_pages)){
				header("location:".BASE_URL);
			}
		}
 	}

 	function replace_words($kata){
 		$kalimat = strtolower(str_replace(" ", "-", $kata));
 		return $kalimat;
 	}

  function trim_words($kata){
    if(strlen($kata)>20){
      $kata2 = substr($kata,0,18);
    }
    return $kata2."...";
  }
	// PAGINATION //
 	function pagination($table,$limit_post){
 		global $dbh,$limit,$offset;
 		$pages = isset($_GET['pages']) ? $_GET['pages'] : 1 ;
		$limit = $limit_post;
		$offset = ($pages-1) * $limit;

		return true;
 	}

 	function pagination_number($table,$limit){
 		global $dbh;
 		$pages = isset($_GET['pages']) ? $_GET['pages'] : 1 ;
		$count_row = $dbh->query("SELECT * FROM $table");
		$total_article = $count_row->rowCount();
		$limit = $limit;
		$offset = ($pages-1) * $limit;
		$total_pages = ceil($total_article / $limit);
		$pagination = 3;
		// START NUMBER
		if($pages <= $pagination+1 ){
			$start_pagination = 1;
		}else if($pages == $total_pages){
			$start_pagination = $total_pages - $pagination;
		}else if($pages > $pagination+1) {
			$start_pagination = $pages - $pagination;

		}
		// END NUMBER
		if($pages == 1){
			$end_pagination = $pagination + 1;
		}else if($pages == $total_pages){
			$end_pagination = $total_pages;
		} else{
			if($pages + $pagination <= $total_pages){
				$end_pagination = $pages + $pagination;
			}else {
				$end_pagination = $total_pages;
			}
		}
		echo "<a href='".URL."admin/index.php?module=article&pages=1'>First | </a>";
		for($i=$start_pagination;$i <= $end_pagination;$i++){
			if($pages == $i){
				$active = "class='active'";
			}else {
				$active = false;
			}
			echo "<a ".$active." href='".URL."admin/index.php?module=article&pages=$i'>$i</a>";
		}

		echo "<a  href='".URL."admin/index.php?module=article&pages=$total_pages'> | Last</a>";

 	}

	// MEMBUAT KATEGORI DINAMIS //

	function parent_check($id = 0){
		global $dbh;
		$query = $dbh->query("SELECT * FROM category WHERE categoryParent = $id");

		if($query->rowCount() > 0){
			return true;
		}else {
			return false;
		}
	}


	function hierarchy($id = 0){
		global $dbh;
		if($id == 0){
			$query_top_level = $dbh->query("SELECT * FROM category WHERE categoryParent = 0 ");
			if($query_top_level->rowCount() > 0){
				echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';

				while($row = $query_top_level->fetch(PDO::FETCH_OBJ)){
					$dataToggle = "";
					if(parent_check($row->categoryID)){
						$dataToggle = "dropdown-toggle";
					}
					echo '<li><a class="dropdown-item '.$dataToggle.' " href="index.php?category='.replace_words($row->categoryName).'&id='.$row->categoryID.'">'.$row->categoryName.'</a>' ;

					if(parent_check($row->categoryID)){
						hierarchy($row->categoryID);
					}

					echo "</li>";

				}
				echo "</ul>";
			}
		}else {
			$query_child = $dbh->query("SELECT * FROM category WHERE categoryParent = $id");
			if($query_child->rowCount()>0){
				echo '<ul class="dropdown-menu">';

				while($row = $query_child->fetch(PDO::FETCH_OBJ)){
					$dataToggle = "";
					if(parent_check($row->categoryID)){
						$dataToggle = "dropdown-toggle";
					}
					echo '<li><a class="dropdown-item" href="index.php?category='.replace_words($row->categoryName).'&id='.$row->categoryID.'">'.$row->categoryName.'</a>';

					if(parent_check($row->categoryID)){
						hierarchy($row->categoryID);
					}

					echo "</li>";
				}
				echo "</ul>";
			}
		}
	}







 ?>
