<?php
require('functions/userFunction.php');
require('includes/header.php');
?>

<div class="py-2 bg-danger">
    <div class="container">
        <h6 class="text-white">Home/Categories</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">                
                <h4>Our Categories</h4>
                <hr>
                <div class="row">
                <?php
                $categories = GetActiveRecord("categories");
                if(mysqli_num_rows($categories) > 0)
                {
                    foreach($categories as $item)
                    { 
                ?>
                    <div class="col-md-3 mb-4">
                        <a href="AllProducts.php?category=<?= $item['slug'];?>">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="uploads/<?=$item['image'];?>" alt="Category Image" class="w-100 custom-height">
                                <p class="text-center mt-1" id="name"><?= $item['name']; ?></p>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php
                    }
                }
                else
                {
                    echo "No category available";
                } 
                ?>
                </div> <!-- End of row -->
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
