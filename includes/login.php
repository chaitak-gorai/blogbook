<?php
include "db.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);

$query = "SELECT * FROM users WHERE username='{$username}'";
$select_user_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($select_user_query)) {
  $db_user_id = $row['user_id'];
  $db_username = $row['username'];
  $db_user_password = $row['user_password'];
  $db_user_firstname = $row['user_firstname'];
  $db_user_lastname = $row['user_lastname'];
  $db_user_role = $row['user_role'];
}

$response['status'] = 'error';
$response['msg'] = 'Unknown login error';
if (!empty($username) && !empty($password)) {
  $password_db = base64_decode($db_user_password);

  if ($username == $db_username && $password == $password_db) {
    if ($db_user_role !== 'new') {
      $_SESSION['username'] = $db_username;
      $_SESSION['user_id'] = $db_user_id;
      $_SESSION['firstname'] = $db_user_firstname;
      $_SESSION['lastname'] = $db_user_lastname;
      $_SESSION['user_role'] = $db_user_role;

      //header("Location: ../admin/index.php");
      $response['status'] = 'success';
      $response['msg'] = 'You will be now redirected to the admin page';
    } else {
      $response['status'] = 'error';
      $response['msg'] = 'Your account has only role "new".';
    }
  } else {
    $response['status'] = 'error';
    $response['msg'] = 'Incorrect username or password.';
  }
} else {
  $response['status'] = 'error';
  $response['msg'] = 'Fields cannot be empty!';
}

echo json_encode($response);
