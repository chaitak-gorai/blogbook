 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->


         <!--
                <button type="button" value="Category" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
-->
         <div>


             <a class="navbar-brand" href="index.php">Blogbook</a>


             <div class="container">

                 <a class="navbar-brand" title="Login First" href='admin/index.php'>Admin</a>
                 <a class="navbar-brand" title="New User?" href='registration.php'>Register</a>
                 <a class="navbar-brand" title="New User?" href='contact.php'>Contact</a>
                 <a class="navbar-brand" title="Already Register?" href='index.php#login'>Login</a>
                 <?php
                    if (isset($_SESSION['username'])) {

                        if (isset($_GET['p_id'])) {

                            $the_post_id = $_GET['p_id'];

                            $query = "SELECT * FROM posts WHERE post_id=$the_post_id";
                            $select_posts = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_posts)) {

                                $author_id = $row['author_id'];
                            }
                            $user_role = $_SESSION['user_role'];
                            $user_id = $_SESSION['user_id'];
                            if ($user_role == 'admin' || $user_id == $author_id) {
                                echo "<a class='navbar-brand' href='admin/posts.php?source=edit_post&p_id={$the_post_id}'> Edit Post</a></li>";
                            }
                        }
                    }

                    ?>

             </div>


             <!--             Collect the nav links, forms, and other content for toggling -->
             <!--
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                   <?php

                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection, $query);


                    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='#'>{$cat_title}</a></li>";
                    }





                    ?>    
                    <li><a href='admin/index.php'>Admin</a></li>
                    <li><a href='registration.php'>Register</a></li>
                 
                    
                    
                    
                    <?php
                    if (isset($_SESSION['username'])) {

                        if (isset($_GET['p_id'])) {

                            $the_post_id = $_GET['p_id'];

                            $query = "SELECT * FROM posts WHERE post_id=$the_post_id";
                            $select_posts = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_posts)) {

                                $author_id = $row['author_id'];
                            }
                            $user_role = $_SESSION['user_role'];
                            $user_id = $_SESSION['user_id'];
                            if ($user_role == 'admin' || $user_id == $author_id) {
                                echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'> Edit Post</a></li>";
                            }
                        }
                    }

                    ?>
                    
                    
                    
                  
                
                
                
                </ul>
            </div>
-->
             <!--             /.navbar-collapse -->
         </div>
     </div>
     <!--         /.container -->
 </nav>