      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Blogbook Admin</a>
          </div>
          <!-- Top Menu Items -->
          <ul class="nav navbar-right top-nav">

              <li><a href="">Users online <span class="useronline"></span></a></li>
              <li><a href="../index.php">HOME</a></li>


              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>

                      <small><?php echo $_SESSION['username']; ?></small>



                      <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li>
                          <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>

                      <li class="divider"></li>
                      <li>
                          <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                      </li>
                  </ul>
              </li>
          </ul>
          <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">
                  <li>
                      <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                  </li>

                  <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts<i class="fa fa-fw fa-caret-down"></i></a>
                      <ul id="posts_dropdown" class="collapse">
                          <li>
                              <a href="posts.php">View all posts</a>
                          </li>
                          <li>
                              <a href="posts.php?source=add_post">Add posts</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="categories.php"><i class="fa fa-fw fa-wrench">Categories</i> </a>
                  </li>
                  <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Users<i class="fa fa-fw fa-caret-down"></i></a>
                      <ul id="demo" class="collapse">
                          <li>
                              <a href="users.php">View Users</a>
                          </li>
                          <li><?php
                                $user_role = $_SESSION['user_role'];

                                if ($user_role == 'admin') {
                                    echo "<a href='users.php?source=add_user'>Add User</a>";
                                } else {
                                    echo "<a href='#' >Add User (Admin Excess)</a>";
                                } ?>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                  </li>
                  <li>
                      <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profiles</a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>


      <!-- preloader -->

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