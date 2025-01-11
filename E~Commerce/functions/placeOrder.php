<?php
session_start();
include("../config/dbconnect.php");

if (isset($_SESSION['auth'])) {

    if (isset($_POST['placeOrder'])) {

        $name = mysqli_real_escape_string($conn, $_POST['name']);  //mysqli used to prevent sql injection
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);

        //validator check if any value is null go back to redirect page
        if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") {
            $_SESSION['message'] = "All fields are mandatory";
            header("location:../checkout.php");
            exit(0);
        }

        //query to fetch total price of  cart items of order 
        $user_id = $_SESSION['login_user']['user_id'];
        $cart_query = "SELECT c.cart_id as cartid , c.product_id, c.product_qty , p.product_id as productid, p.name, p.image,p.selling_price
        From carts c , products p WHERE c.product_id=p.product_id AND c.user_id='$user_id' ORDER BY c.cart_id DESC";
        $run_query = mysqli_query($conn, $cart_query);

        $total_price = 0;
        foreach ($run_query as $citem) {
            $total_price += $citem['selling_price'] * $citem['product_qty'];  //get ordered items total price with qty
        }

        //insert order details
        $tracking_no = "EcomShop" . rand(111, 999) . substr($pincode, 2);
        $insert_query = "INSERT into orders(tracking_no,user_id,name,email,phone,address,pincode,total_price,payment_mode,payment_id)
        VALUES ('$tracking_no','$user_id','$name','$email','$phone','$address','$pincode','$total_price','$payment_mode','$payment_id')";
        $run_insert_query = mysqli_query($conn, $insert_query);

        if ($run_insert_query) {
            $order_id = mysqli_insert_id($conn);  //get last recent inserted order id

            foreach ($run_query as $citem) {
                $product_id = $citem['product_id'];
                $product_qty = $citem['product_qty'];
                $price = $citem['selling_price'];
                
                //add order items
                $insert_order_items = "INSERT into order_items (order_id,product_id,Quantity,price) 
                VALUES ('$order_id','$product_id','$product_qty','$price')";
                $run_order_items_query = mysqli_query($conn, $insert_order_items);
                //end  adding order items

                //Fetch products quantity 
                $product_query="SELECT * from products WHERE product_id='$product_id' LIMIT 1";
                $run_product_query=mysqli_query($conn,$product_query);
                $productData = mysqli_fetch_array($run_product_query);
                $current_qty=$productData['qty'];
                
                //minus ordered item qty from total product qty
                $new_qty=$current_qty-$product_qty;
                //update quantity
                $update_qty="UPDATE products SET qty='$new_qty' WHERE product_id='$product_id'";
                $run_update_query=mysqli_query($conn,$update_qty);
            }

            //after placing order delete items from cart
            $delete_items="DELETE from carts where user_id='$user_id'";
            $run_items_query=mysqli_query($conn,$delete_items);
            //end delete query

            //store order placed message in session
            $_SESSION['message'] = "Order Placed Successfully";
            header("location:../my_orders.php");
            die();
        }
    }
} else {
    header("location: ../index.php");
}
