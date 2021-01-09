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
                        Welcome to Admin


                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                        
                        $query="SELECT * FROM posts";
                        $select_all_post=mysqli_query($connection,$query);
                        $post_counts=mysqli_num_rows($select_all_post);
                        
                        echo " <div class='huge'>{$post_counts}</div>";
                        
                        ?>


                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                        
                        $query="SELECT * FROM comments";
                        $select_all_comments=mysqli_query($connection,$query);
                        $comment_counts=mysqli_num_rows($select_all_comments);
                        
                        echo " <div class='huge'>{$comment_counts}</div>";
                        
                        ?>



                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                        
                        $query="SELECT * FROM users";
                        $select_all_users=mysqli_query($connection,$query);
                        $user_counts=mysqli_num_rows($select_all_users);
                        
                        echo " <div class='huge'>{$user_counts}</div>";
                        
                        ?>



                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                        
                        $query="SELECT * FROM categories";
                        $select_all_categories=mysqli_query($connection,$query);
                        $categories_counts=mysqli_num_rows($select_all_categories);
                        
                        echo " <div class='huge'>{$categories_counts}</div>";
                        
                        ?>


                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <?php
                      $query="SELECT * FROM posts WHERE post_status='published'";
                        $select_pub_post=mysqli_query($connection,$query);
                        $post_pub_counts=mysqli_num_rows($select_pub_post);
            
            
                 $query="SELECT * FROM posts WHERE post_status='draft'";
                        $select_all_draft_post=mysqli_query($connection,$query);
                        $post_draft_counts=mysqli_num_rows($select_all_draft_post);
                        
                      
                 $query="SELECT * FROM comments WHERE comment_status='unapproved'";
                        $unapproved_comments=mysqli_query($connection,$query);
                        $unapproved_counts=mysqli_num_rows($unapproved_comments);
            
                 $query="SELECT * FROM users WHERE user_role='subscriber'";
                        $subscribers=mysqli_query($connection,$query);
                        $subscriber_counts=mysqli_num_rows($subscribers);
            
            
            
            
            ?>





            <!-- /.row -->
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Data', 'Count'],


                        <?php
            
            $element_text=['All Posts','Active Posts','Draft Posts','Comments','Unapproved comments','Users','Subscribers','Categories'];
            $element_count=[$post_counts,$post_pub_counts,$post_draft_counts,$comment_counts,$unapproved_counts,$user_counts,$subscriber_counts,$categories_counts];
            
            
           for($i=0;$i<7;$i++){
               
               echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
               
           } 
            
            
            ?>

                    ]);

                    var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>
            <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="js/script2.js"></script>




</body>

</html>