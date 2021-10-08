<?php
session_start();

// delete session data
unset($_SESSION['username']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['user_role']);

header("Location: ../../index.php");
