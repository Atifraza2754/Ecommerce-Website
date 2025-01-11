<?php
session_start();
require("../config/dbconnect.php");

if (isset($_SESSION['auth'])) {

    if (isset($_POST['scope'])) {

        $scope = $_POST['scope'];
        switch ($scope) {

            //case of adding product to cart 
            case "add":
                $product_id = $_POST['product_id'];  //get product_id from increasing product qty btn
                $product_qty = $_POST['product_qty']; //get product_qty value from increasing product qty btn

                $user_id = $_SESSION["login_user"]['user_id'];

                //check if a product already exsit in cart
                $check_cart="SELECT * from carts WHERE product_id='$product_id' AND user_id='$user_id'";
                $run_check_query=mysqli_query($conn,$check_cart);

                if(mysqli_num_rows($run_check_query) > 0 ){
                    echo "Product_exist";
                }
                else
                {
                $cart_query = "INSERT into carts (user_id,product_id,product_qty) Values('$user_id','$product_id','$product_qty')";
                $run_query = mysqli_query($conn, $cart_query);

                if ($run_query) {
                    echo 201;
                } 
                else {
                    echo 500;
                }
            }
                break;
            //end add to product

            //start update product qty
            case "update":
                $product_id = $_POST['product_id'];  //get product_id from increasing product qty btn
                $product_qty = $_POST['product_qty']; //get product_qty value from increasing product qty btn

                $user_id = $_SESSION["login_user"]['user_id'];

                 //check if a product already exsit in cart
                 $check_cart="SELECT * from carts WHERE product_id='$product_id' AND user_id='$user_id'";
                 $run_check_query=mysqli_query($conn,$check_cart);
 
                 if(mysqli_num_rows($run_check_query) > 0 ){

                     $update_query="UPDATE carts SET product_qty='$product_qty' WHERE product_id='$product_id' AND user_id='$user_id'";
                     $run_update_query=mysqli_query($conn,$update_query);
                     if($run_update_query){
                        echo 200;
                     }
                     else{
                        echo 500;
                     }
                 }
                 else
                 {
                    echo "Something went wrong";
                 }                

                 break;

                 //delete item  from cart
                 case("delete"):
                    $cart_id=$_POST['cart_id'];
                    $user_id = $_SESSION["login_user"]['user_id'];

                    //check if a product already exsit in cart
                 $check_cart="SELECT * from carts WHERE cart_id='$cart_id' AND user_id='$user_id'";
                 $run_check_query=mysqli_query($conn,$check_cart);

                 if(mysqli_num_rows($run_check_query) > 0 ){

                    $delete_query="DELETE from carts WHERE cart_id='$cart_id'";
                    $run_delete_query=mysqli_query($conn,$delete_query);
                    if($run_delete_query){
                       echo 200;
                    }
                    else{
                       echo "Something went wrong";
                    }
                }
                else
                {
                   echo "Something went wrong";
                }    
                break;

            default:
                echo 500;
        }
    }
} 
else {
    echo 401;
}
