<?php

$host="localhost";
$username="root";
$password="";
$dbname="ecommerce";

//database connection
$conn=mysqli_connect($host,$username,$password,$dbname);

//check database connection
if(!$conn){
    die("connection failed".mysqli_connect_error());
}


?>