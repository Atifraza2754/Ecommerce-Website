<?php
require('functions/userFunction.php');
include('includes/header.php');
include('authenticate_cart.php');

if (isset($_GET['t_no'])) {
    $tracking_no = $_GET['t_no'];

    //verify tracking no from database
    $validated_data = CheckTrackingNo($tracking_no);
    if (mysqli_num_rows($validated_data) < 0) {
?>
        <h4>Tracking No not Available</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Tracking No not Available</h4>
<?php
    die();
}

$row = mysqli_fetch_array($validated_data);
?>

<div class="py-2 bg-danger">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">Home /</a>
            <a href="my_orders.php" class="text-white">My Orders /</a>
            <a href="#" class="text-white">View Order</a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header bg-info">
                            <span class="text-white fs-4">View Order</span>
                            <a href="my_orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row shadow">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $row['name'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $row['email'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $row['phone'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tracking No</label>
                                            <div class="border p-1">
                                                <?= $row['tracking_no'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Zip code</label>
                                            <div class="border p-1">
                                                <?= $row['pincode'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $row['address'] ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user_id = $_SESSION['login_user']['user_id'];
                                            //fetch order details from product and order tables
                                            $orderQuery = "SELECT o.order_id as orderid , o.tracking_no, o.user_id, oi.*, p.* From 
                                            orders o, order_items oi, products p WHERE o.user_id='$user_id' AND oi.order_id=o.order_id
                                            AND p.product_id=oi.product_id AND o.tracking_no='$tracking_no'";
                                            $run_order_query = mysqli_query($conn, $orderQuery);
                                            if (mysqli_num_rows($run_order_query) > 0) {
                                                foreach ($run_order_query as $Orderitems) {
                                            ?>
                                                    <tr>
                                                        <td><img src="uploads/<?= $Orderitems['image'] ?>" width="50px" height="50px" alt="<?= $Orderitems['name'] ?>">
                                                            <?= $Orderitems['name'] ?>
                                                        </td>
                                                        <td><?= $Orderitems['price'] ?></td>
                                                        <td><?= $Orderitems['Quantity'] ?></td>
                                                    </tr>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5>Total Price : <span class="float-end fw-bold"><?= $row['total_price'] ?></span></h5>
                                    <hr>
                                    <label class="fw-bold">Payment Mode</label>
                                    <div class="border p-1 mb-3">
                                        <?= $row['payment_mode'] ?>
                                    </div>
                                    <label class="fw-bold">Status</label>
                                    <div class="border p-1 mb-3">
                                        <?php
                                        if ($row['status'] == 0) {
                                            echo "Under Process";
                                        } elseif ($row['status'] == 1) {
                                            echo "Completed";
                                        } elseif ($row['status'] == 2) {
                                            echo "Cancelled";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>