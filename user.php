<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php session_start(); ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- <link href="css/styles.css" rel="stylesheet"> -->
    <link href="css/form_style.css" rel="stylesheet">
    <!-- Page Content -->
    <div class="container">

        <div class="row ">

            <!-- Blog Entries Column -->
         

                <?php
             
                if (isset($_GET['u_id'])) {
                    $link_user_id = $_GET['u_id'];

           

                    $query = "SELECT * FROM users WHERE user_id=$link_user_id";
                    $select_all_users_query = mysqli_query($connection, $query);


                    while ($row = mysqli_fetch_assoc($select_all_users_query)) {

                        $user_id = $row['user_id'];
                         $username = $row['username'];
                        $user_fname = $row['user_firstname'];
                        $user_lname = $row['user_lastname'];
                        $user_mail = $row['user_email'];
                           $user_image = $row['user_image'];
                        $user_role = $row['user_role'];
                        $user_info=$row['user_info'];

                        //  $query = "SELECT * FROM categories WHERE cat_id={$user_category_id}";
                        //         $select_categories_id = mysqli_query($connection, $query);
                        //         $cat = mysqli_fetch_assoc($select_categories_id);
                        //         $user_category = $cat['cat_title'];
                    }
                ?>

                      

                        <div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <!-- <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""> -->
                  <img class="img-responsive" src="user_images/<?php echo $user_image; ?>" alt="">
              </a>
              <h1>@<?php echo $username ?></h1>
              <p><?php echo $user_mail ?></p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#uposts"> <i class="fa fa-calendar"></i> Recent Posts </a></li>
              <!-- <li><a href="#"> <i class="fa fa-edit"></i> Edit profile</a></li> -->
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">
    
      <div class="panel">
          <div class="bio-graph-heading">
             <?php echo $user_info;?> 
          </div>
          <div class="panel-body bio-graph-info">
              <h1>Bio Graph</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>First Name </span>: <?php echo $user_fname ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>: <?php echo $user_lname ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>User Name </span>: <?php echo $username ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Role </span>: <?php echo $user_role ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>:<?php echo $user_mail ?></p>
                  </div>
              
              </div>
          </div>
      </div>
      <div>
      <div class="row " id="uposts">
<?php 
 $link_user_id2 = $_GET['u_id'];

           

   
  $query = "SELECT * FROM posts WHERE author_id=$link_user_id2 AND post_status='published'";
                    $select_all_posts_query = mysqli_query($connection, $query);


                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_title = $row['post_title'];
                        $post_id = $row['post_id'];
                     
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        // $post_content = strip_tags($row['post_content'], "");
                        $post_category_id = $row['post_category_id'];
                        $post_comment = $row['post_comment_count'];
                        $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
                        $select_categories_id = mysqli_query($connection, $query);
                        $cat = mysqli_fetch_assoc($select_categories_id);
                        $post_category = $cat['cat_title'];?>

          
              <div class="col-md-12">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div ><img class="img-responsive" src="images/<?php echo $post_image?>" alt=""  style="width: 100px; height: 100px; "></div>
                          </div>
                          <div class="bio-desk">
                              <!-- <h4 class="red">Envato Website</h4>
                              <p>Started : 15 July</p>
                              <p>Deadline : 15 August</p> -->
                              <a href="post.php?p_id=<?php echo $post_id ?>"><h4 class="title" style=" font-size: x-large; font-weight: 600; font-stretch: extra-expanded; overflow-wrap:break-word;"><?php echo $post_title; ?> </h4></a>




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










                          </div>
                      </div>
                  </div>
              </div>
              
     









                        <?php } ?>

                        </div>
      </div>
  </div>
</div>
</div>
                    <?php } else {
                    header("Location:index.php");
                }


                    ?>































            </div>

          
        </div>
        <!-- /.row -->

        <hr>

        <?php

        include "includes/footer.php";


        ?>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
