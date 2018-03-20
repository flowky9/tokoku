
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Input Products</h1>
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
                        Input Product
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="pages/action/insert_product.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Produk</label>
                                        <input class="form-control" name="price">
                                        <div id="helpPrice" class="form-text text-muted">
                                          Contoh : 150000
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                            <div class="form-group-category" style="padding:3px;overflow:scroll;width:auto;height:200px;border:1px solid #d6d6d6">
                                            <?php hierarchy(); ?>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Images</label>
                                        <input type="file" name="image[]" multiple="multiple">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea class="form-control" rows="3" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input class="form-control" name="stock">
                                        <div id="helpPrice" class="form-text text-muted">
                                          Contoh : 3
                                        </div>
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