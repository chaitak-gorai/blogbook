<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/scrollTopButton.php"; ?>


<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                if (isset($_GET['category'])) {
                    $link_category = $_GET['category'];
                }
                $query = "SELECT * FROM categories WHERE cat_id={$link_category}";
                $select_categories_id = mysqli_query($connection, $query);
                $cat = mysqli_fetch_assoc($select_categories_id);
                $post_category = $cat['cat_title'];
                ?>
                <h1 class="text-center" style="color:white;"><?php echo $post_category; ?>-Blog Posts</h1>
                <?php
                $query = "SELECT * FROM posts WHERE post_category_id=$link_category";
                $select_all_posts_query = mysqli_query($connection, $query);

                $render = include_once __DIR__ . "/includes/post-view.php";
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $render($row);
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
