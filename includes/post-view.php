<?php
return function (array $row, array $currentCategory = []) use ($connection) {
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
    $post_views_count = $row['post_views_count'];
    if ($post_status !== 'published') {
        return;
    }
    if (empty($currentCategory)) {
        // TODO: create CategoryRepository to centralize those calls
        $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
        $select_categories_id = mysqli_query($connection, $query);
        $cat = mysqli_fetch_assoc($select_categories_id);
        $post_category = $cat['cat_title'];
    } else {
        $post_category = $currentCategory['cat_title'];
    }
?>
    <div class="row" style="margin-top: 10px; padding: 0 15px;">
        <div class="col-6">
            <article class="blog-card" style="z-index: 100;">
                <div class="blog-card__background">
                    <div class="card__background--wrapper">
                        <div class="card__background--main">
                            <img src="images/<?php echo $post_image; ?>" alt="" style="width: 100%; height: 50vh;">
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
                    <h5 style=" font-size: x-large; font-weight: 600; font-stretch: extra-expanded; overflow-wrap:break-word; ">
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?> </a>
                        <div style="text-align:right;
                                        float:right;">
                            <button type="button" class="btn btn-sml btn-dark"><a
                                        href="user.php?u_id=<?php echo $post_author_id ?>"><i
                                            class="glyphicon glyphicon-edit"> <?php echo $post_author; ?></i></a>
                            </button>
                        </div>
                    </h5>
                    <p>
                        <button type="button" class="btn btn-sml btn-primary"><i
                                    class="glyphicon glyphicon-tags"> <?php echo $post_category; ?></i></button>


                        <!-- <i class="fa fa-pencil-square-o"></i> <?php echo $post_author; ?> -->
                        <button type="button" class="btn btn-sml btn-warning"><i
                                    class="	glyphicon glyphicon-comment"> <?php echo $post_comment; ?></i></button>
                        <button type="button" class="btn btn-sml btn-success"><i
                                    class="glyphicon glyphicon-eye-open"></i> <?php echo $post_views_count; ?></button>
                    </p>
                    <p><a href="post.php?p_id=<?php echo $post_id; ?>"
                          style="text-decoration:none"><?php echo $post_content; ?></a></p>
                    <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn1 btn--with-icon"><i
                                class="btn-icon glyphicon glyphicon-arrow-right"></i>READ MORE</a>
                </div>
            </article>
            </a>
        </div>
    </div>
    <section class="detail-page">
        <div class="container ">

        </div>
    </section>
<?php } ?>
