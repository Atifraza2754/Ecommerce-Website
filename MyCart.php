<?php
require('functions/userFunction.php');
include('includes/header.php');
include('authenticate_cart.php');

?>

<div class="py-2 bg-danger">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">Home /</a>
            <a href="MyCart.php" class="text-white">Cart</a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div id="loadcart">
                    <?php
                    $product = GetCartItem();
                    if (mysqli_num_rows($product) > 0) {
                    ?>
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <h6>Products</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>Price</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Quantity</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Action</h6>
                            </div>
                        </div>
                        <div>
                            <?php
                            foreach ($product as $cartitem) { ?>
                                <div class="card shadow-sm mb-3 product_data">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $cartitem['image'] ?>" alt="product_image" width="60px">
                                        </div>
                                        <div class="col-md-3">
                                            <h6><?= $cartitem['name']; ?></h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6>RS <?= $cartitem['selling_price'] ?></h6>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <input type="hidden" class="prod_id" value="<?= $cartitem['product_id'] ?>">
                                            <div class="input-group mb-3" style="width:110px;">
                                                <button class="input-group-text decrement-btn updateQty">-</button>
                                                <input type="text" class="form-control product-qty text-center bg-white" value="<?= $cartitem['product_qty'] ?>" disabled>
                                                <button class="input-group-text increment-btn updateQty">+</button>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <button class="btn btn-sm btn-danger deleteItem" value="<?= $cartitem['cartid'] ?>">
                                                <i class="fa fa-trash me-2"></i>Remove</button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="float-end">
                            <a href="checkout.php" class="btn btn-outline-success">Proceed to checkout</a>
                        </div>
                    <?php
                    }
                    else{
                    ?>
                    <div class="card card-body text-center shadow">
                        <h4 class="py-3 ">
                            Your cart is empty
                        </h4>
                    </div>

                    <?php    
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>