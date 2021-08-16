<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


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


                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_title = $row['post_title'];
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_author_id = $row['author_id'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = strip_tags(substr($row['post_content'], 0, 1000));
                    $post_status = $row['post_status'];
                    $post_category_id = $row['post_category_id'];
                    $post_comment = $row['post_comment_count'];

                    if ($post_status == 'published') {
                ?>


                        <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

               
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>                    
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>  -->

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-6">

                                <article class="blog-card" style="z-index: 100;">

                                    <div class="blog-card__background">
                                        <div class="card__background--wrapper">

                                            <!-- <div class="card__background--main" style="background-image: url('images/<?php echo $post_image; ?>');"> -->
                                            <div class="card__background--main">
                                                <img src="images/<?php echo $post_image; ?>" alt="" style="  max-width: 100%;     height: fit-content;">
                                                <div class="card__background--layer"></div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="blog-card__head">
                                        <span class="date__box">
                                            <span class="date__day"><?php echo $post_date; ?></span>

                                        </span>
                                    </div>
                                    <div class="blog-card__info">

                                        <h5 style=" font-size: x-large; font-weight: 600; font-stretch: extra-expanded; overflow-wrap:break-word; "><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?> </a>
                                            <div style="text-align:right;
                                        float:right;">
                                               <button type="button" class="btn btn-sml btn-dark"> <a href="user.php?u_id=<?php echo $post_author_id ?>"><i class="		glyphicon glyphicon-edit"> <?php echo $post_author; ?></i></a></button>
                                            </div>
                                        </h5>


                                        <p>




                                            <button type="button" class="btn btn-sml btn-primary"><i class="	glyphicon glyphicon-tags"> <?php echo $post_category; ?></i></button>



                                            <!-- <i class="fa fa-pencil-square-o"></i> <?php echo $post_author; ?> -->
                                            <button type="button" class="btn btn-sml btn-warning"><i class="	glyphicon glyphicon-comment"> <?php echo $post_comment; ?></i></button>

                                        </p>
                                        <p><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_content; ?></a></p>
                                        <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn1 btn--with-icon"><i class="btn-icon glyphicon glyphicon-arrow-right"></i>READ MORE</a>
                                    </div>
                                </article>
                                </a>
                            </div>
                        </div>



                <?php  }
                } ?>














            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";  ?>
        </div>
        <!-- /.row -->

        <hr>

        <?php

        include "includes/footer.php";


        ?>