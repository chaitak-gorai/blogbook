<?php include "includes/ad_header.php"?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/ad_navigation.php"?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Categories
                    </h1>
                    <div class="col-xs-6">
                        <?php

                       insert_categories();



                              ?>





                        <form action="" method="post">
                            <div class="form-group" class="col-xs_6">
                                <label for="cat-title" class="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="add Category">
                            </div>


                        </form>

                        <?php
                              if(isset($_GET['edit'])){
                                  $cat_id=$_GET['edit'];                             


                                  include "includes/update_categories.php";
                              }
                              ?>










                    </div>










                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category title</th>
                                    <th colspan="2">Admin options</th>
                                </tr>
                            </thead>
                            <tbody>







                    <?php find_categories(); ?>

                     <?php delete_categories();   ?>
                                    
                                    
                                    
                                  




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script><script src="js/script2.js"></script>

</body>

</html>