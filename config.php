<?php
$host="localhost";
$user="root";
$password="";
$database="capital";


$connection=mysqli_connect($host, $user, $password, $database);

if (!$connection){
    die("database connection failed:");
    mysqli_connect_error();
}else{
    // echo 'connected';
}

?>