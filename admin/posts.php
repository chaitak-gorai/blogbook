<?php include "includes/ad_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/ad_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        All Posts
                    </h1>
                    <?php

                    if (isset($_GET['source'])) {

                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {

                        case 'add_post';
                            include "includes/add_post.php";
                            break;

                        case 'edit_post';
                            include "includes/edit_post.php";
                            break;

                        case '340';
                            echo "NICE 340";
                            break;

                        default:
                            include "includes/view_all_posts.php";
                    }







                    ?>


                </div>
            </div>
            <!-- /.row -->

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
<!-- <script src="https://cdn.tiny.cloud/1/nkozq64khqyq7l925vbf3sk06cauwi9x56geophavrrprqj0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
<script src="https://cdn.tiny.cloud/1/2lk0dnyg6az318s1tno40pzlxvhfj43be8jhrxauhpjwkltw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="js/script.js"></script>
</body>

</html>