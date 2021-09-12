<?php
//Local SQL database
//UNcomment it While running in Local Environment
// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "";
// $db['db_name'] = "cms";

//Remote SQL database
//Comment it while running in local Environment
// $db['db_host']="remotemysql.com";
// $db['db_user']="DFc7onUv5f";
// $db['db_pass']="7GfIqBKfQm";
// $db['db_name']="DFc7onUv5f";

$db['db_host']="sql212.epizy.com";
$db['db_user']="epiz_27346577";
$db['db_pass']="ay6kE4vrAx31";
$db['db_name']="epiz_27346577_cms";

foreach ($db as $key => $value) {

    define(strtoupper($key), $value);
}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
