<?php 

$kota = isset($_SESSION['kota']) ? $_SESSION['kota'] : false;

// echo $kota; ?>
<div class="row pesanan">
	<div class="col-md-6">
	<div class="card">
		<div class="card-header">Data Pesanan</div>
		<div class="card-body">
				<form>
				<div class="form-group">
			    <label for="exampleFormControlInput1">Nama</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Email address</label>
			    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Phone</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="08xxxxxxx">
			  </div>
			  <div class="form-group">
			    <label  for="exampleFormControlSelect1">Kota Tujuan</label>
			    <select id="kota" class="form-control" id="exampleFormControlSelect1">
			    	<option value="">Please Select</option>
			    	<?php

			    		$query = $dbh->query("SELECT distinct kabupaten FROM city_data ORDER BY kabupaten ASC");

			    		while($row = $query->fetch(PDO::FETCH_OBJ)){
			    			$kabupaten = $row->kabupaten;
			    	 ?>
			      <option <?php 

			      		if($kota == $kabupaten){
			      			echo "selected='selected'";
			      		}

			       ?> value="<?php echo $kabupaten; ?>" ><?php echo $row->kabupaten; ?></option>
			      <?php } ?>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Kecamatan</label>
			    <select id="kecamatan" class="form-control" id="exampleFormControlSelect1">
			    	<option value="">Please Select</option>
			    	<?php


			    		$query2 = $dbh->query("SELECT distinct kecamatan FROM city_data  WHERE kabupaten = '$kota' ORDER BY kecamatan ASC");

			    		while($row2 = $query2->fetch(PDO::FETCH_OBJ)){
			    	 ?>
			      <option value="<?php echo $row2->kecamatan; ?>" ><?php echo $row2->kecamatan; ?></option>
			      <?php } ?>
			    </select>
			</div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Alamat Lengkap</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
			  </div>

			  <button class="btn btn-primary">Order Sekarang</button>
			</form>
		</div>
	</div>
</div>
<div class="col-md-6 detail-order">
	<h2>Detail Pesanan</h2>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-info">
          <tr>
            <th>No</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sub Price</th>
          </tr>
        </thead>
        <tbody>
          <?php

          	$no = 1;
            $grandTotal = 0;
            foreach($cart as $key => $value){

          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $value['productName']; ?></td>
            <td><div class="col-12 col-sm-12">
              <input type="text" id="<?php echo $key; ?>" class="form-control form-control-sm cart-qty" style="width:30px" value="<?php echo $value['quantity']; ?>">
            </div></td>
            <td><?php echo rupiah($value['productPrice']); ?></td>
            <?php $subPrice = $value['productPrice'] * $value['quantity'];  ?>
            <td><?php echo rupiah($subPrice); ?></td>
          </tr>


          <?php 

            $grandTotal = $grandTotal + $subPrice;

          } ?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Total</b></td>
            <td><?php echo rupiah($grandTotal); ?></td>
          </tr>
        </tbody>
      </table>

    </div>


</div>
</div>


<script>

    $( "#kota" ).change(function(e) {
    	var abc = $(this).val();
		
		 $.ajax({
	      method  : "POST",
	      url     : "getKota.php",
	      data    : "kota="+abc

	    }).done(function(data){
	      location.reload();
	    });

	});
</script>