<?php

session_start();
require_once("function/helper.php");
require_once("function/connection.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;

$cart = $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

// echo "<pre>";
// print_r($cart);
// echo "</pre>";


$sizeOfCart = count($cart);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TokoKu</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-4-navbar.css">
  <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- NAVBAR  -->
        <?php include_once("include/header.php"); ?>
      </div>
    </div>
    
    <?php

      $file = "page/".$page.".php";

      if(file_exists($file)){
        include_once($file);
      }else {
        include_once("page/home.php");
      }

     ?>

     <!-- FOOTER  -->

       <hr/>
       <!-- Button trigger modal -->
       <div class="text-center modalFooter">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Hubungi Kami Segera !
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hubungi Kami</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table class="kontakKami">
                  <tr>
                    <th>WA</th>
                    <th>:</th>
                    <td>0812 0997 1234</td>
                  </tr>
                  <tr>
                    <th>LINE</th>
                    <th>:</th>
                    <td>@nofatek</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <th>:</th>
                    <td>nauval@nofatek.com</td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
       </div>
  </div>
  <!-- END OF CONTAINER  -->



<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4-navbar.js"></script>
<?php

if($page == "detail"){
  echo '
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
  ';
}

?>



<script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
  classActive();
  function removeActive(){
   $("a.dropdown-item").removeClass("active");
  }

  function classActive(){
    $(".dropdown-item").click(function(e){
      removeActive();
      $(this).addClass("active");
      e.preventDefault();
    });

  }
  
</script>
</body>
</html>

<?php $dbh = null; ?>
