<?php
include "includes/db.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];

$username = mysqli_real_escape_string($connection, $username);
$email = mysqli_real_escape_string($connection, $email);
$password = mysqli_real_escape_string($connection, $password);
$fullname = mysqli_real_escape_string($connection, $fullname);

$password = base64_encode($password);

$response['status'] = 'error';
$response['msg'] = 'Error';

$check_user_sql = "SELECT username FROM users WHERE username='$username'";
$check_user_query = mysqli_query($connection, $check_user_sql);

// check if user already exists
if ($check_user_query->num_rows) {
    $response['status'] = 'error';
    $response['msg'] = 'Username already exists!';
} else {
    $query = "INSERT INTO users(user_firstname,username,user_email,user_password,user_role) ";
    $query .= "VALUES('{$fullname}','{$username}','{$email}','{$password}','new')";
    $register_user_query = mysqli_query($connection, $query);

    if ($register_user_query) {
        $response['status'] = 'success';
        $response['msg'] = 'Registered Successfully! We will contact you soon!';
    } else {
        $response['status'] = 'error';
        $response['msg'] = 'Error occured. Please try again later!';
    }
}

// send responnse as json data
echo json_encode($response);
exit;
