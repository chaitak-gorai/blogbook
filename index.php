<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
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
                <h1 class="text-center" style="color:white;">Welcome to Blogbook</h1>
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
                    $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
                    $select_categories_id = mysqli_query($connection, $query);
                    $cat = mysqli_fetch_assoc($select_categories_id);
                    $post_category = $cat['cat_title'];
                    if ($post_status == 'published') {




                ?>



                        <!-- First Blog Post -->
                        <!-- <h2>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $post_id; ?>">
                            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr> -->
                        <!-- <article class="postcard dark blue">
                            <a class="postcard__img_link" href="post.php?p_id=<?php echo $post_id; ?>">
                                <img class="postcard__img" src="images/<?php echo $post_image; ?>" alt="Image Title" />
                            </a>
                            <div class="postcard__text">
                                <h1 class="postcard__title blue"><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h1>
                                <div class="postcard__subtitle small">
                                    <time datetime="2020-05-25 12:00:00">
                                        <i class="fas fa-calendar-alt mr-2"></i><?php echo $post_date; ?>
                                    </time>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt"><?php echo $post_content; ?></div>
                                <ul class="postcard__tagbox">
                                    <li class="tag__item"><i class="fas fa-tag mr-2"><?php echo $post_category; ?></i></li>
                                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                                    <li class="tag__item play blue">
                                        <a href="post.php?p_id=<?php echo $post_id; ?>"><i class="fas fa-play mr-2"></i>Read More</a>
                                    </li>
                                </ul>
                            </div>
                        </article> -->


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


                        <section class="detail-page">
                            <div class="container ">

                            </div>
                        </section>

                <?php  }
                } ?>



                <ul class="pager">
                    <?php
                    for ($i = 1; $i <= $count; $i++) {
                        if ($i == $page) {
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