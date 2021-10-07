<?php
//Local SQL database
//use it if you want to view the database on localhost by importing the database file.
// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "";
// $db['db_name'] = "blogbook";

//Remote SQL database
//use it if you dont need the schema or any manual changes to database
$db['db_host']="remotemysql.com";
$db['db_user']="dUcPjiYNKu";
$db['db_pass']="lGB1H36B1r";
$db['db_name']="dUcPjiYNKu";


foreach ($db as $key => $value) {

    define(strtoupper($key), $value);
}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
