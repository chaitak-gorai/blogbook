<?php include "includes/db.php"; ?>

<?php




$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];



$username = mysqli_real_escape_string($connection, $username);
$email = mysqli_real_escape_string($connection, $email);
$password = mysqli_real_escape_string($connection, $password);
$fullname = mysqli_real_escape_string($connection, $fullname);



$password = base64_encode($password);

//    $password=base64_encode($password);
// 

$query = "INSERT INTO users(user_firstname,username,user_email,user_password,user_role) ";
$query .= "VALUES('{$fullname}','{$username}','{$email}','{$password}','new')";
$register_user_query = mysqli_query($connection, $query);

if ($register_user_query) {
    echo "Success";
} else {
    echo "Error";
}
?>
