<?php

$server = "localhost";
$user_name = "root";
$password = "";
$database = "tournament";
$db_handle = mysqli_connect($server , $user_name , $password)or die("Cannot Connect");
$db_found = mysqli_select_db($db_handle, $database);
?>