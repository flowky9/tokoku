<?php
  
  session_start();
  include_once("/function/connection.php");
  include_once("/function/helper.php");

  // if(isset($_GET['order']) == "success"){
  //   session_unset($_SESSION['cart']);
  // }
  
  $page = isset($_GET['page']) ? $_GET['page'] : false;
  $user_id = isset($_SESSION['userID']) ? $_SESSION['userID'] : false;

  if(!$user_id){
    header("location:".URL."login.php");
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- head -->
<?php include_once("head.php"); ?>
<!-- /head  -->
</head>

<body>

    <div id="wrapper">

    <!-- Navigation -->
    <?php include_once("sidebar.php"); ?>
    <!-- //nav -->

    <!-- CONTENT PAGE  -------------------------------------------------------->
      <?php

        $filename = "pages/".$page.".php";
        if(file_exists($filename)){
          include_once($filename);
        }else {
          include_once("pages/home.php");
        }

       ?>
    <!-- //content  -->

  </div>
    <!-- /#wrapper -->

  <!-- script -->
  <?php include_once("footer.php"); ?>
  <!-- /script -->
</body>

</html>

<?php $dbh = null; ?>