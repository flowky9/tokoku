<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Category</h1>
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
                          List Category
                      </div>

                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Category</th>
                                      <th>Parent Category</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php

                                  $query = $dbh->query("SELECT * FROM category");

                                  $no = 1;
                                  while($row = $query->fetch(PDO::FETCH_OBJ)){

                                ?>
                                  <tr class="odd gradeX">
                                      <td><?php echo $no++; ?></td>
                                      <td><?php echo $row->categoryName; ?></td>
                                      <td><?php 
                                        $parentID = $row->categoryParent;
                                        $querySub = $dbh->query("SELECT * FROM category WHERE categoryID = '$parentID' ");
                                        
                                        if($querySub->rowCount() > 0){
                                          $rowSub = $querySub->fetchAll();

                                          foreach ($rowSub as $key => $value) {
                                            echo $value["categoryName"];
                                          }
                                        }else {
                                          echo " - ";
                                        }

                                       ?></td>
                                      <td class="center"><a onclick="return confirm('Jika anda menghapus category ini, maka product didalamnya akan terhapus juga')" class="btn btn-sm btn-primary" href="<?php echo URL.'admin/pages/action/delete_category.php?id='.$row->categoryID ?>">Delete</a> <a class="btn btn-sm btn-primary" href="<?php echo URL.'admin/index.php?page=update_category&id='. $row->categoryID ?>">Update</a></td>
                                  </tr>
                                <?php    
                                  }
                                ?>
                              </tbody>
                          </table>
                          <!-- /.table-responsive -->
                      </div>
                      <!-- /.panel-body -->
                  </div>
                <!-- /.panel -->

            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

<!--         <script>
        function deleteCategory (){
            if (confirm('data product akan terhapus juga')) {
                window.location = "http://localhost/tokoku/admin/pages/action/delete_category.php";
            } else {
                location.reload();
            }
        }
    </script> -->