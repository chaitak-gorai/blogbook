<?php
include "includes/ad_header.php";

$source = '';
$includeFile = '';

if (isset($_GET['source']) && !empty($_GET['source'])) {
    $source = $_GET['source'];
}

switch ($source) {
    case 'add_post';
        $includeFile = 'includes/add_post.php';
        break;
    case 'edit_post';
        $includeFile = 'includes/edit_post.php';
        break;
    default:
        $includeFile = 'includes/view_all_posts.php';
}
?>

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

                    <?php include $includeFile; ?>

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
<script src="https://cdn.tiny.cloud/1/2lk0dnyg6az318s1tno40pzlxvhfj43be8jhrxauhpjwkltw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="js/script.js"></script>
</body>

</html>