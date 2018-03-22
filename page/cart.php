<div class="row cart">
  <div class="col-md-12 cart-wrapper">
    <div>
      <h3>Cart</h3>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 cart-wrapper">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-info">
          <tr>
            <th>No</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sub Price</th>
            <th>Action</th>
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
            <td><a href="deleteCart.php?id=<?php echo $key; ?>"><img src="img/icon/trash.png" alt="Hapus dari Keranjang" width="20"></a></td>
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
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="d-flex justify-content-between">

      <div class="text-left">
        <a class="btn btn-success a-btn"> < Back to Shop </a>
      </div>
      <div class="text-right">
        <a href="<?php echo URL."index.php?page=data_order" ?>" class="btn btn-success a-btn">Order Now ></a>
      </div>
    </div>
  </div>
</div>

<script>
  $(".cart-qty").on("input",function(e){
    var barang_id = $(this).attr("id");
    var value = $(this).val();

    $.ajax({
      method  : "POST",
      url     : "updateCart.php",
      data    : "barang_id="+barang_id+"&value="+value

    }).done(function(data){
      location.reload();
    });
  });
</script>
