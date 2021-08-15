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
                        All Comments
                    </h1>
<?php

if(isset($_GET['source'])){
    
    $source=$_GET['source'];
    
    
    
}else{
    $source='';
}
switch($source){
        
        case 'add_post';
        include "includes/add_post.php";
        break;
        
        case 'edit_post';
        include "includes/edit_post.php";
        break;
        
        case '340';
        echo"NICE 340";
        break;
        
    default:
        include "includes/view_all_comments.php";



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
<script src="js/bootstrap.min.js"></script><script src="js/script2.js"></script>

</body>

</html>