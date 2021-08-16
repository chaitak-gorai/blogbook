<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php session_start(); ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <link href="css/styles.css" rel="stylesheet">
    <!-- Page Content -->
    <div class="container">

        <div class="row ">

            <!-- Blog Entries Column -->
            <div class="col-md-8 wt1">

                <?php
                if (isset($_GET['p_id'])) {
                    $link_post_id = $_GET['p_id'];

                    $view_query = "UPDATE posts SET post_views_count=post_views_count +1 WHERE post_id=$link_post_id";
                    $send_query = mysqli_query($connection, $view_query);

                    $query = "SELECT * FROM posts WHERE post_id=$link_post_id";
                    $select_all_posts_query = mysqli_query($connection, $query);


                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_title = $row['post_title'];
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_author_id = $row['author_id'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        // $post_content = strip_tags($row['post_content'], "");
                        $post_category_id = $row['post_category_id'];
                        $post_comment = $row['post_comment_count'];
                        $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
                        $select_categories_id = mysqli_query($connection, $query);
                        $cat = mysqli_fetch_assoc($select_categories_id);
                        $post_category = $cat['cat_title'];

                ?>

                        <div class="blog_post" style="font-size: 20px;">

                            <!-- First Blog Post -->
                            <!-- <h2>
                                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                            </h2> -->

                            <h4 class="title" style=" font-size: x-large; font-weight: 600; font-stretch: extra-expanded; overflow-wrap:break-word;"><?php echo $post_title; ?> </h4>

                            <div style="text-align:right;
                                        float:right;">
                               <button type="button" class="btn btn-sml btn-dark"> <a href="user.php?u_id=<?php echo $post_author_id ?>"><i class="		glyphicon glyphicon-edit"> <?php echo $post_author; ?></i></a></button>
                            </div>
                            <!-- </h2> -->
                            <!-- <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p> -->

                            <i class="glyphicon glyphicon-calendar " style=" background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
  padding: 0.4rem 1rem;
  border-radius: 3rem;
  font-size:15px;
  width:fit-content;
  text-align:left;"><?php echo $post_date; ?></i>
  <i class="glyphicon glyphicon-tags " style=" background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
  padding: 0.4rem 1rem;
  border-radius: 3rem;
  font-size:15px;
  width:fit-content;
  text-align:left;"><?php echo $post_category; ?></i>
  <i class="glyphicon glyphicon-comment " style=" background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
  padding: 0.4rem 1rem;
  border-radius: 3rem;
  font-size:15px;
  width:fit-content;
  text-align:left;"><?php echo $post_comment; ?></i>





                            <!-- <button type="button" class="btn btn-sml btn-primary"><i class="	glyphicon glyphicon-tags"> <?php echo $post_category; ?></i></button>



                            <i class="fa fa-pencil-square-o"></i> <?php echo $post_author; ?> -->
                            <!-- <button type="button" class="btn btn-sml btn-warning"><i class="	glyphicon glyphicon-comment"> <?php echo $post_comment; ?></i></button> -->

                            </p>

                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                            <hr>
                            <div class="content"><?php echo $post_content; ?></div>
                        </div>

                        <hr>
                        <!-- Blog Comments -->
                        <div class="well">
                            <h4>Comments</h4>
                            <?php
                            $query = "SELECT * FROM comments WHERE comment_post_id={$link_post_id} ";
                            $query .= "AND comment_status='approved' ";
                            $query .= "ORDER BY comment_id DESC ";
                            $comment_query1 = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($comment_query1)) {
                                $comment_date = $row['comment_date'];
                                $comment_content = $row['comment_content'];
                                $comment_author = $row['comment_author'];

                            ?>

                                <div class="media " style="padding-left: 10px;">



                                    <div class="media-body " style="border-radius: 0;">
                                        <h4 class="media-heading"><?php echo $comment_author; ?>
                                            <small><?php echo $comment_date; ?></small>
                                        </h4>
                                        <?php echo $comment_content; ?>
                                    </div>
                                </div>



                            <?php } ?>

                        </div>
                <?php }
                } else {
                    header("Location:index.php");
                }


                ?>





                <?php
                if (isset($_POST['create_comment'])) {
                    $link_post_id = $_GET['p_id'];

                    $comment_author =  $_POST['comment_author'];
                    $comment_email =  $_POST['comment_email'];
                    $comment_content =  $_POST['comment_content'];



                    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

                        $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
                        $query .= "VALUES ($link_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now())";

                        $create_comment_query = mysqli_query($connection, $query);
                        if (!$create_comment_query) {
                            die('qwery failed' . mysqli_error($connection));
                        }

                        $query = "UPDATE posts SET post_comment_count= post_comment_count + 1 WHERE post_id=$link_post_id";
                        $update_comment_count = mysqli_query($connection, $query);
                    } else {

                        echo "<script>alert('Fileds Cannot Be empty')</script>";
                    }
                }






                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="content">Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->




                <!-- Comment -->




















            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";  ?>
        </div>
        <!-- /.row -->

        <hr>

        <?php

        include "includes/footer.php";


        ?>