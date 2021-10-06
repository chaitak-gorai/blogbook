<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/scrollTopButton.php"; ?>

<?php session_start(); ?>
<style>

</style>

<body>


    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row ">

            <!-- Blog Entries Column -->
            <div class="col-md-8 ">
                <h1 class="text-center" style="color:white;">Welcome to <img id="logo123" src="../images/logo.png" alt="gg"
               style="  height: 80px;
        width: 200px;

   "> </h1>
                <?php
                $results_per_page = 5;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "";
                };

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                    $page_2 = 7;
                } else {

                    $page_1 = ($page - 1) * 5;
                    $page_2 = $page_1 + 8;
                }


                $post_count_query = "SELECT * FROM posts WHERE post_status='published'";
                $find_count = mysqli_query($connection, $post_count_query);
                $count = mysqli_num_rows($find_count);

                $count = ceil($count / 5);



                $query = "SELECT * FROM posts WHERE post_status='published' LIMIT " . $page_1 . ',' . $results_per_page;
                $select_all_posts_query = mysqli_query($connection, $query);

                $render = include_once __DIR__ . "/includes/post-view.php";
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $render($row);
                }
                ?>



                <ul class="pager">
                    <?php
                    for ($i = 1; $i <= $count; $i++) {
                        if ($i == $page || $page == '' && $i == 1) {
                            echo "<li><a href='index.php?page={$i}' class='active'>{$i}</a></li>";
                        } else {
                            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                        }
                    }




                    ?>








                </ul>



                <h4 align="center" class="wt">
                    << Pages>>
                </h4>






            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";  ?>
        </div>
        <!-- /.row -->

        <hr>



        <?php

        include "includes/footer.php";


        ?>
