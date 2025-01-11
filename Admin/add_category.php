<?php include("../middleware/adminMiddleware.php"); ?>
<?php include('includes/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-secondary ">
                    <h4 class="text-light">Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="category_process.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter category Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter Slug" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea rows="3" name="description" class="form-control" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta title" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Description</label>
                            <textarea rows="3" name="meta_description" class="form-control" placeholder="Enter Meta Description"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keywords</label>
                            <textarea rows="3" name="meta_keyword" class="form-control" placeholder="Enter Meta Keyword"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" >
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular"  >
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" class="form-control" name="add_category">Add Category</button>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>