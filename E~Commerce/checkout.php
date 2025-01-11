<?php
require('functions/userFunction.php');
include('includes/header.php');
include('authenticate_cart.php');

?>

<div class="py-2 bg-danger">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">Home /</a>
            <a href="checkout.php" class="text-white">Checkout</a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeOrder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" placeholder="Enter your full name" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" placeholder="Enter your Email" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" placeholder="Enter phone no " class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin code</label>
                                    <input type="text" name="pincode" placeholder="Enter your pin code" class="form-control" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" placeholder="Enter your Address" class="form-control" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                </form>
                <div class="col-md-5">
                    <h5>Order Details</h5>
                    <hr>
                    <?php
                    $product = GetCartItem();
                    $total_price = 0;
                    foreach ($product as $cartitem) { ?>
                        <div class="mb-1 border">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="uploads/<?= $cartitem['image'] ?>" alt="product_image" width="60px">
                                </div>
                                <div class="col-md-5">
                                    <h6><?= $cartitem['name']; ?></h6>
                                </div>
                                <div class="col-md-3">
                                    <h6><?= $cartitem['selling_price']; ?></h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>x<?= $cartitem['product_qty']; ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php
                        $total_price += $cartitem['selling_price'] * $cartitem['product_qty'];
                    }
                    ?>
                    <hr>
                    <h5>Total Price : <span class="float-end fw-bold"><?= $total_price ?></span></h5>
                    <div>
                        <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" name="placeOrder" class="btn btn-primary w-100">Confrim And Place Order | COD</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
</div>
<?php include('includes/footer.php'); ?>