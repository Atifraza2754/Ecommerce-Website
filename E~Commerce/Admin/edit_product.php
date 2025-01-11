<?php include("../middleware/adminMiddleware.php"); ?>
<?php include('includes/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = GetProductByID("products", $id);

                if (mysqli_num_rows($product) > 0) 
                {
                    $row=mysqli_fetch_array($product);
                    ?>
                        <div class="card mt-5">
                            <div class="card-header bg-secondary ">
                                <h4 class="text-light">Update Products
                                    <a href="View_products.php" class="btn btn-warning btn-sm float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="product_process.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="mb-0">Select Category</label>
                                            <select name="category_id" class="form-select mb-2">
                                                <option selected> Select Category</option>
                                                <?php
                                                $categories = GetAllData("categories");
                                                if (mysqli_num_rows($categories) > 0) {
                                                    foreach ($categories as $item) {
                                                ?>
                                                        <option value="<?= $item['cat_id'] ?>" <?= $row['category_id'] == $item['cat_id']?'selected':'' ?>><?= $item['name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo "No category available";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="product_id" value="<?= $row['product_id']; ?>">
                                        <div class="col-md-6">
                                            <label class="mb-0">Name</label>
                                            <input type="text" name="name" class="form-control mb-2" value="<?=$row['name']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">Slug</label>
                                            <input type="text" name="slug" class="form-control mb-2" value="<?=$row['slug']; ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Small Description</label>
                                            <textarea rows="3" name="small_description" class="form-control mb-2" ><?= $row['small_description']; ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Description</label>
                                            <textarea rows="3" name="description" class="form-control mb-2" ><?=$row['description'];?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">Original Price</label>
                                            <input type="text" name="original_price" class="form-control mb-2" value="<?=$row['original_price']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">Selling Price</label>
                                            <input type="text" name="selling_price" class="form-control mb-2" value="<?=$row['selling_price']; ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Upload Image</label>
                                            <input type="hidden" name="old_image" value="<?=$row['image']?>">
                                            <input type="file" name="image" class="form-control mb-2" >
                                            <img src="../uploads/<?=$row['image']?>" alt="Product image" height="40px" width="40px">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="mb-0">Quantity</label>
                                                <input type="number" name="qty" class="form-control mb-2" value="<?=$row['qty']; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="mb-0">Status</label><br>
                                                <input type="checkbox" name="status" <?=$row['status'] =='0' ? '':'Checked' ?>>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="mb-0">Trending</label><br>
                                                <input type="checkbox" name="trending" <?=$row['trending'] =='0' ? '':'Checked' ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control mb-2" value="<?=$row['meta_title'] ; ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Meta Description</label>
                                            <textarea rows="3" name="meta_description" class="form-control" ><?= $row['meta_description'];?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Meta Keywords</label>
                                            <textarea rows="3" name="meta_keyword" class="form-control" ><?=$row['meta_keywords'];?></textarea>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <button type="submit" class="btn btn-primary" class="form-control mb-2" name="update_product">Update Products</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                }
                else 
                {
                    echo "Product not found";
                }
                
            } 
            else 
            {
                echo "id missing ";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>