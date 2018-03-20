<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update Category</h1>
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
                        Category
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="pages/action/doUpdateCategory.php">
                                    <?php

                                        $id = $_GET['id'];
                                        $query = $dbh->query("SELECT * FROM category WHERE categoryID = $id ");

                                        $row = $query->fetch(PDO::FETCH_OBJ);
                                        $parentID = $row->categoryParent;

                                    ?>
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" name="name" value="<?php echo $row->categoryName; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control" name="subcategory">
                                            <option value="0" > - </option>
                                            <?php 

                                                $query = $dbh->query("SELECT * FROM category WHERE categoryID != $id ");

                                                while($rowID = $query->fetch(PDO::FETCH_OBJ)){
                                            ?>
                                                <option <?php if($parentID  == $rowID->categoryID){echo "selected = 'selected'";} ?> value="<?php echo $rowID->categoryID; ?>" > <?php echo $rowID->categoryName; ?> </option>
                                            <?php
                                                }

                                             ?>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

    <script>
        $(document).on("click",function(){
            if (confirm('Are you sure you want to save this thing into the database?')) {
                window.location = "http://localhost/tokoku/admin/pages/action/delete_category.php";
            } else {
                location.reload();
            }
        })
    </script>