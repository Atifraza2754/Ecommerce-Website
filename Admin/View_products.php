<?php include("../middleware/adminMiddleware.php"); ?> 
<?php include('includes/header.php'); ?>
<div class="py-5">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="products">
                <div class="card-header bg-info">
                    <h4 class="text-light">Products</h4>
                </div>
            
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead class="bg-success text-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $showProducts = GetAllData("products");
                        if(mysqli_num_rows($showProducts) > 0)
                        {
                            foreach($showProducts as $item)
                            { 
                                ?>
                            <tr>
                                <td><?= $item['product_id']; ?></td>
                                <td><?= $item['name']; ?></td>
                                <td>
                                    <img  src="../uploads/<?= $item['image']; ?>" width="40px" height="40px">
                                </td>
                                <td>
                                    <?= $item['status'] == '0' ? "Visible":"Hidden" ?>
                                </td>
                                <td>
                                   <a href="edit_product.php?id=<?= $item['product_id'];?>" class="btn btn-primary btn-sm"> Edit</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm delete_product" value="<?= $item['product_id'];?>">Delete</button>
                                </td>
                            </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No record found";
                        }
                        ?>

                    </tbody>

                </table>
            </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('includes/footer.php'); ?>
