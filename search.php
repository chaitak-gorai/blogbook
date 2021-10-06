<?php include "includes/db.php";?>
<?php include "includes/header.php";?>


<body>

    <!-- Navigation -->
   <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               <?php


                if(isset($_POST['submit'])){
                    $search= $_POST['search'];


                $query="SELECT *FROM posts WHERE post_tags LIKE '%$search%'";
                $search_query=mysqli_query($connection, $query);

                    if(!$search_query){

                        die("query faikled".mysql_error($connection));
                    }


                $count=mysqli_num_rows($search_query);

               if($count==0){
                   include_once __DIR__ . "/includes/empty-post-view.php";
               } else {
                    $render = include_once __DIR__ . "/includes/post-view.php";
                    while($row=mysqli_fetch_assoc($search_query)){
                        $render($row);
                    }
               }
                }
?>
























            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php include "includes/sidebar.php";  ?>
        </div>
        <!-- /.row -->

        <hr>

      <?php

include "includes/footer.php";


?>
