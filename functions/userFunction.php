<?php
session_start();
require("config/dbconnect.php");

function GetActiveRecord($table)
{
    global $conn;
    $query="SELECT * from $table WHERE status='0'";
    return $query_run=mysqli_query($conn,$query);
}


function GetTrendingProducts()
{
    global $conn;
    $query="SELECT * from products WHERE trending='1'";
    return mysqli_query($conn,$query);
}



function GetActiveSlug($table,$slug){
    global $conn;
    $query="SELECT * from $table WHERE slug='$slug' AND status='0' LIMIT 1";
    return $query_run=mysqli_query($conn,$query);
}

function GetProductByCategory($category_id){
    global $conn;
    $product="SELECT * from products Where category_id='$category_id' AND status='0'";
    return mysqli_query($conn,$product);
}

function GetActiveID($table,$id){
    global $conn;
    $query="SELECT * from $table WHERE cat_id='$id' AND status='0'";
    return $query_run=mysqli_query($conn,$query);
}

function GetCartItem(){
    global $conn;
    $user_id=$_SESSION['login_user']['user_id'];
    $cart_query="SELECT c.cart_id as cartid , c.product_id, c.product_qty , p.product_id as productid, p.name, p.image,p.selling_price
    From carts c , products p WHERE c.product_id=p.product_id AND c.user_id='$user_id' ORDER BY c.cart_id DESC";
    return mysqli_query($conn,$cart_query);
}

function GetOrderItems(){
    global $conn;
    $user_id=$_SESSION['login_user']['user_id'];
    $order_item_query="SELECT * from orders WHERE user_id='$user_id' ORDER BY order_id DESC";
    return mysqli_query($conn,$order_item_query);

}

function CheckTrackingNo($tracking_no){
    global $conn;
    $user_id=$_SESSION['login_user']['user_id'];
    $tracking_query="SELECT * from orders WHERE tracking_no='$tracking_no' AND user_id='$user_id'";
    return mysqli_query($conn,$tracking_query);

}

function redirect($url,$message)
{
    $_SESSION['message']=$message;
    header("location:" .$url);
    exit();
}
?>