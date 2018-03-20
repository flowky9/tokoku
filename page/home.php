<div class="row">
  <div class="col-md-12">
    <!-- CAROUSEL  -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 img-fluid" src="img/slider1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 img-fluid" src="img/slider2.jpg" alt="Second slide" width="100%">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="col-md-12">
    <!-- KETERANGAN HOME -->
    <p class="text-center card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae et, sapiente quasi ab assumenda numquam libero eos perspiciatis repellendus laborum ad, reprehenderit ducimus ipsam sequi, aperiam. Ipsa autem, reprehenderit esse aspernatur optio et a illo expedita consequuntur, deleniti, veniam? Ipsum laudantium repellat consequatur est, totam cum quo reprehenderit aperiam repellendus.</p>
  </div>
</div>
<div class="row">
  <?php 

    $query = $dbh->query("SELECT * FROM product ORDER BY productID DESC");

    while($row = $query->fetch(PDO::FETCH_OBJ)){

   ?>
  <div class="col-12 col-sm-12 col-md-3 list-product">
    <!-- LIST PRODUCT -->
    <div class="card" >
    <?php 

      $productID = $row->productID;

      $queryImage = $dbh->query("SELECT * FROM image_map WHERE productID = $productID ORDER BY imageID ASC LIMIT 1");

      $rowImage = $queryImage->fetch(PDO::FETCH_OBJ);



      ?>
    <img class="card-img-top" src="<?php echo URL.'img/'.$rowImage->imageName; ?>" alt="Card image cap">
    <div class="card-body">
      <h3 class="card-title product-title"><a href="index.php?page=detail&id=<?php echo $productID; ?>"><?php echo $row->productName; ?></a></h3>
      <h5 class="text-danger"><?php echo rupiah($row->productPrice); ?></h5>
      <a href="addToCart.php?id=<?php echo $productID; ?>" class="btn btn-primary"> + Add to Cart</a>
    </div>
  </div>
  </div>

  <?php } ?>


</div>
