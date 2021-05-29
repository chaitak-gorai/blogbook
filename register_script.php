<?php include "includes/db.php"; ?>

<?php




$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];



$username = mysqli_real_escape_string($connection, $username);
$email = mysqli_real_escape_string($connection, $email);
$password = mysqli_real_escape_string($connection, $password);



$password = base64_encode($password);

//    $password=base64_encode($password);
// 

$query = "INSERT INTO users(username,user_email,user_password,user_role) ";
$query .= "VALUES('{$username}','{$email}','{$password}','new')";
$register_user_query = mysqli_query($connection, $query);

if ($register_user_query) {
    echo "Success";
} else {
    echo "Error";
}
?>