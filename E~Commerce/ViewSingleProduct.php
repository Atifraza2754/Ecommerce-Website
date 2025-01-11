<?php

require('functions/userFunction.php');
require('includes/header.php');

if (isset($_GET['product'])) 
{
    $product_slug=$_GET['product'];
    $product_record=GetActiveSlug("products",$product_slug);
    $product=mysqli_fetch_array($product_record);

    if($product)
    {
        
        ?>
                <!--   banner -->
            <div class="py-2 bg-danger">
            <div class="container">
                <h6 class="text-white">
                    <a class="text-white" href="AllCategories.php">
                        Home/
                    </a>
                    <a class="text-white" href="AllCategories.php">
                        Categories/
                    </a>
                    <?= $product['name']; ?>
                </h6>
            </div>
        </div>
        <!--  end banner -->
          <div class="bg-light py-4">
          <div class="container mt-3 product_data">
                  <div class="row">
                      <div class="col-md-4">
                        <div class="shadow">
                            <img src="uploads/<?= $product['image']; ?>" alt="Product image" class="w-100">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <h4 class="fw-bold"><?= $product['name']; ?>
                        <span class="float-end text-primary"><?php if($product['trending']){ echo "Trending"; } ?></span>
                        </h4>
                        <hr>
                          <p><?= $product['small_description']; ?></p>
                         <!--  price row start -->
                          <div class="row">
                              <div class="col-md-6">
                              <h5>RS  <span class="text-success fw-bold"><?=  $product['selling_price']; ?></span></h5>
                              </div>
                              <div class="col-md-6">
                                  <h5>RS  <s class="text-danger"><?=  $product['original_price']; ?></s></h5>
                              </div>
                          </div>
                          <!--  price row end -->
                        <!--  increase/decrease quantity -->
                          <div class="row">
                            <div class="col-md-4">
                            <div class="input-group mb-3" style="width:110px;">
                                <button class="input-group-text decrement-btn ">-</button>
                                <input type="text" class="form-control product-qty text-center bg-white" value="1" disabled>
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                            </div>
                          </div>
                          <!--  input row end -->
                        <!--  Add to Cart row start -->
                          <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary px-4 add-to-cart" value="<?=  $product['product_id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                            </div>
                            <div class="col-md-6">
                            <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>Add to Wishlist</button>

                            </div>
                          </div>
                         <!--  Add to Cart row end -->
                          <hr>
                          <h6>Product Description</h6>
                          <p><?= $product['description']; ?></p>
                      </div>
                  </div>
              </div>
          </div>

        
        <?php
    }
    else
    {
        echo "Product Not available";
    }



} else {
    echo "Category Not available";
}
include('includes/footer.php');
?>