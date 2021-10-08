<?php
include "includes/ad_header.php";

if (isset($_SESSION['username'])) {
    $pusername = $_SESSION['username'];
}

// fetch user details
$query = "SELECT * FROM users WHERE username='{$pusername}'";
$user_profile_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($user_profile_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    $user_info = $row['user_info'];
}

// update user details
$message = '';
if (isset($_POST['update_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_image = $_FILES['user_image']['name'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_info = $_POST['user_info'];
    $user_password = $_POST['user_password'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    move_uploaded_file($user_image_temp, "../user_images/$user_image");

    if (empty($user_image)) {
        $query2 = "SELECT *FROM users WHERE username='$username' ";
        $select_image3 = mysqli_query($connection, $query2);
        while ($row2 = mysqli_fetch_array($select_image3)) {
            $user_image = $row2['user_image'];
        }
    }

    if (!empty($username) && !empty($user_password)) {
        $user_password = base64_encode($user_password);
        $query = "UPDATE users SET ";
        $query .= "user_firstname='{$user_firstname}', ";
        $query .= "user_lastname='{$user_lastname}', ";
        $query .= "user_role='{$user_role}', ";
        $query .= "user_image='{$user_image}', ";
        $query .= "user_info='{$user_info}', ";
        $query .= "username='{$username}', ";
        $query .= "user_email='{$user_email}', ";
        $query .= "user_password='{$user_password}' ";
        $query .= "WHERE username='{$pusername}'";

        $edit_user_query2 = mysqli_query($connection, $query);

        confirm($edit_user_query2);

        $message = "User Updated";
    } else {
        $message = "Empty Username Or Password";
    }
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
                        User Profile
                    </h1>
                    <h6 class="text-center"><?= $message; ?></h6>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" value="<?= $user_firstname; ?> " class="form-control" name="user_firstname" id="firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" value="<?= $user_lastname; ?> " class="form-control" name="user_lastname" id="lastname">
                        </div>
                        <div class="form-group">
                            <label for="userImage">User Image</label>
                            <input type="file" name="user_image" id="userImage">
                        </div>
                        <div class="form-group">
                            <label for="shortInfo">Short Info</label>
                            <input type="text" value="<?= $user_info; ?> " class="form-control" name="user_info" id="shortInfo">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" placeholder="<?= $username; ?> Retype Username" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="<?= $user_email; ?> " class="form-control" name="user_email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" placeholder="<?= base64_decode($user_password); ?> Retype Userpassword" name="user_password" id="password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update_user" value="Update Profile">
                        </div>
                    </form>
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

</body>

</html>