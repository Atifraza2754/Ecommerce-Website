<?php
session_start();
require("../config/dbconnect.php");

function GetAllData($table){
    global $conn;
    $query="SELECT * from $table";
    return $query_run=mysqli_query($conn,$query);
}

/* fetch those records whose status is visible */
function GetActiveRecord($table){
    global $conn;
    $query="SELECT * from $table WHERE status='0'";
    return $query_run=mysqli_query($conn,$query);
}

function GetRecordByID($table,$id){
    global $conn;
    $query="SELECT * from $table WHERE cat_id='$id'";
    return $query_run=mysqli_query($conn,$query);
}
//Fetch Products by Product id
function GetProductByID($table,$id){
    global $conn;
    $query="SELECT * from $table WHERE product_id='$id'";
    return $query_run=mysqli_query($conn,$query);
}

//fetch all orders in admin to check wether it completed or not
function GetAllOrders(){
    global $conn;
    $order_query="SELECT * from orders WHERE status='0'";
    return $run_query=mysqli_query($conn,$order_query);

}


function redirect($url,$message)
{
    $_SESSION['message']=$message;
    header("location:" .$url);
    exit();
}

?>