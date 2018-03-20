<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
                <?php 
    
                    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                    if($notif == 'failed'){
                ?>
                    <div class="alert alert-danger" role="alert">
                      Nama Produk atau Category harus di isi!
                    </div>
                <?php
                    }else if($notif == 'success'){

                 ?> 
                    <div class="alert alert-success" role="alert">
                      Data berhasil di update !
                    </div>
                 <?php      
                    }

                 ?>
             <div class="panel panel-default">
                  <div class="panel-heading">
                      List Product
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                      <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Product</th>
                                  <th>Price</th>
                                  <th>Category</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php

                              $query = $dbh->query("SELECT * FROM product");
                              $no = 1;
                              while($row = $query->fetch(PDO::FETCH_OBJ)){
                            ?>
                              <tr class="">
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $row->productName; ?></td>
                                  <td><?php echo $row->productPrice; ?></td>
                                  <td><?php
                                    $productID = $row->productID;
                                    $queryCategory = $dbh->query("SELECT category_map.*,category.categoryName FROM category_map JOIN category WHERE productID = '$productID' AND category_map.categoryID = category.categoryID");

                                    $rowCategory = $queryCategory->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    $catName = "";
                                    foreach($rowCategory as $key => $value){
                                     $catName .= $value["categoryName"].", ";

                                    }

                                    $catName = substr($catName,0,-2);

                                    echo $catName;

                                  ?></td>
                                  <td class="center"><a onclick="return confirm('Product akan di hapus')" class="btn btn-sm btn-primary" href="<?php echo URL.'admin/pages/action/delete_product.php?id='.$row->productID ?>">Delete</a> <a class="btn btn-sm btn-primary" href="<?php echo URL.'admin/index.php?page=update_product&id='.$row->productID ?>">Update</a></td>
                              </tr>
                            <?php
                              }
                            ?>
                          </tbody>

                      <!-- /.table-responsive -->
                  </div>
                  <!-- /.panel-body -->
              </div>
            <!-- /.panel -->

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
