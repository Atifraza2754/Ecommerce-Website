<?php include("../middleware/adminMiddleware.php"); ?>
<?php include('includes/header.php'); ?>
<div class="py-5">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="category">
                <div class="card-header bg-info">
                    <h4 class="text-light">Categories</h4>
                </div>
            
            <div class="card-body">
                <table class="table table-bordered table-striped">
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
                        $showCateg = GetAllData("categories");
                        if(mysqli_num_rows($showCateg) > 0)
                        {
                            foreach($showCateg as $item)
                            { 
                                ?>
                            <tr>
                                <td><?= $item['cat_id']; ?></td>
                                <td><?= $item['name']; ?></td>
                                <td>
                                    <img  src="../uploads/<?= $item['image']; ?>" width="40px" height="40px">
                                </td>
                                <td>
                                    <?= $item['status'] == '0' ? "Visible":"Hidden" ?>
                                </td>
                                <td>
                                   <a href="edit_category.php?id=<?= $item['cat_id'];?>" class="btn btn-primary btn-sm"> Edit</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm delete_category" value="<?= $item['cat_id'];?>">Delete</button>
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
