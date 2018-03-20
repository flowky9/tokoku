<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Input Category</h1>
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
                      Data berhasil di upload !
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
                                <form method="POST" action="pages/action/insert_category.php">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control" name="subcategory">
                                            <option value="0" > - </option>
                                            <?php 

                                                $query = $dbh->query("SELECT * FROM category");

                                                while($row = $query->fetch(PDO::FETCH_OBJ)){
                                            ?>
                                                <option value="<?php echo $row->categoryID; ?>" > <?php echo $row->categoryName; ?> </option>
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