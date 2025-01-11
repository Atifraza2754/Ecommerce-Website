<?php include("../middleware/adminMiddleware.php"); ?>
<?php include('includes/header.php'); ?>
<div class="py-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $category=GetRecordByID("categories",$id);

                    if(mysqli_num_rows($category)>0)
                    {    
                        $rows=mysqli_fetch_assoc($category);
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Update Category
                                <a href="View_categories.php" class="btn btn-warning btn-sm float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="category_process.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="category_id"  value="<?= $rows['cat_id']; ?>" >
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?= $rows['name']; ?>" class="form-control" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" value="<?= $rows['slug']; ?>" class="form-control" >
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea rows="3" name="description"  class="form-control"><?= $rows['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload Image</label>
                                        <input type="file" name="image" class="form-control">
                                        <label for="">Current Image</label>
                                        <img src="../uploads/<?= $rows['image']; ?>" width="40px" height="40px">
                                        <input type="hidden" name="old_image" value="<?= $rows['image']; ?>" >
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Title</label>
                                        <input type="text" name="meta_title" value="<?= $rows['meta_title']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Description</label>
                                        <textarea rows="3" name="meta_description" class="form-control" ><?= $rows['meta_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Keywords</label>
                                        <textarea rows="3" name="meta_keyword"  class="form-control" ><?= $rows['meta_keywords']; ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" <?= $rows['status'] ? "checked":"" ?> >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Popular</label>
                                        <input type="checkbox" name="popular" <?= $rows['popular'] ? "checked":"" ?> >
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" class="form-control" name="update_category">Update Category</button>
                                    </div>
            
                                </div>
                                </form>
                            </div>
                        </div>

                <?php
                    }
                    else{
                        echo "category not Found";
                    }
                }
                else{
                    echo "missing id from url";
                }
            ?>
        </div>
    </div>
</div>
</div>


<?php include('includes/footer.php'); ?>