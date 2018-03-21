<?php 
  
  $productID = isset($_GET['id']) ? $_GET['id'] : false;

 ?>


<div class="row">
  <div class="col-md-12 col-12 col-sm-12 ">
    <div class="text-center">
      <!-- IMAGE BIG  -->

      <img id="bigImage" class="img-fluid img-big" src="" alt="">
    </div>
    <div class="text-center">
      <!-- IMAGE THUMBNAIL  -->
      <?php 

          $queryImage = $dbh->query("SELECT * FROM image_map WHERE productID = $productID ORDER BY imageID ASC");

          while($rowImage = $queryImage->fetch(PDO::FETCH_OBJ)){

       ?>
      <a class="getImg" href=""><img src="img/<?php echo $rowImage->imageName; ?>" alt="" class="img-thumbnail thumb-product img-fluid thumb-first" width="100"></a>

      <?php } ?>
    </div>
  </div>
</div>

<div class="row description-product">

    <div class="card" style="width: 100%;">
    <div class="card-header bg-transparent">
      <div id="productHeader">
        <div class="text-left">
          <h3>ASUS A455LF WX091D-0001</h3>
          <h5>Rp 5.000.000</h5>
        </div>
        <div class="text-right">
          <label class="d-block" for="">stock : 10</label>
          <a class=" btn btn-primary btn-sm d-block" href="addToCart.php?id=<?php echo $productID; ?>">Add to Cart <span class="add-product">+</span></a>
        </div>
      </div>
      </div>

    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel aspernatur laudantium, odio minima possimus hic natus asperiores, assumenda eos quas, illum provident quisquam sint aut pariatur fugit necessitatibus cupiditate perferendis.</p>
    </div>
  </div>

</div>

<script type="text/javascript">
// media query
function myFunction(x) {
    if (x.matches) { // If media query matches
        $("#productHeader").addClass("d-flex justify-content-between");
    }else {
       $("#productHeader").removeClass("d-flex justify-content-between");
    }
}

var x = window.matchMedia("(min-width: 768px)")
myFunction(x) // Call listener function at run time
x.addListener(myFunction) // Attach listener function on state changes

// product images gallery
var imgSrc = $("img.thumb-first").attr("src");
$("#bigImage").attr("src", imgSrc);
  $(".getImg").click(function(e) {
    var imgSrc = $(this).find("img").attr("src");
    $("#bigImage").attr("src", imgSrc);
    e.preventDefault();
  });
</script>
