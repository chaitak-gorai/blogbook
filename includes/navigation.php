<!-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-ex2-collapse">

                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Start Bootstrap</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex2-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</nav> -->





<nav class="navbar stroke   " role="navigation" style="background-color: rgba(0,0,0,)!important;
color:white;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->


        <div class="navbar-header xyz">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-ex2-collapse" style="margin: 5px;">

                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar" style="background-color: white;"></span>
                <span class="icon-bar" style="background-color: white;"></span>
                <span class="icon-bar" style="background-color: white;"></span>
            </button>
            <a class="navbar-brand" href="index.php">Blogbook</a>
            <a class="navbar-brand " title="Already Register?" href='index.php#login'>Login</a>
            <a class="navbar-brand  " title="Login First" href='admin/index.php' onclick="return admin()">Admin</a>
            <div class="heads"></div>

        </div>

        <div>





            <div class="container collapse navbar-collapse navbar-ex2-collapse " style="float: right; height: 1px;">


                <a class="navbar-brand " title="New User?" href='registration.php'>Register</a>
                <a class="navbar-brand" title="New User?" href='contact.php'>Contact</a>

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
<div class="preloader">
  <div class="box">
  <div></div>  
  <div></div>  
  <div></div>  
  </div>

</div>
<script>
     function preloader() {
  window.addEventListener("load", () => {
    document.querySelector(".preloader").classList.add("fade-out");
    setTimeout(() => {
      document.querySelector(".preloader").style.display = "none";
    }, 600);
  });
}
preloader();
 </script>

<script>
    function showErrors(error, alrt) {

        const cards = document.querySelector('.xyz');
        const heads = document.querySelector('.heads');


        const errordivs = document.createElement('div');

        errordivs.className = alrt;
        errordivs.appendChild(document.createTextNode(error));
        cards.insertBefore(errordivs, heads);

        setTimeout(clearError, 3000);

    }

    function clearError() {
        document.querySelector('.alert').remove();
    }

    function admin() {
        <?php $session_value = (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; ?>
        var myvar = '<?php echo $session_value; ?>';
        if (myvar === '') {
            showErrors('Access Denied! Login first', 'alert alert-danger navbar-brand');
            return false;
        }

    }
</script>