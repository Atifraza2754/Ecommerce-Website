<?php
require('functions/userFunction.php');
require('includes/header.php');

if (isset($_GET['category'])) {

    $category_slug = $_GET['category'];  //get slug from url
    $category = GetActiveSlug("categories", $category_slug,);  //this category variable will have category name
    $row = mysqli_fetch_array($category);
    if ($row) {
        $cat_id = $row['cat_id'];

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
                    <?= $row['name']; ?>
                </h6>
            </div>
        </div>
        <!--  end banner -->

        <div class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?= $row['name']; ?></h4>
                        <hr>
                        <div class="row">
                            <?php
                            $products = GetProductByCategory($cat_id);
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-md-3 mb-4">
                                        <a href="ViewSingleProduct.php?product=<?= $item['slug']; ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="product Image" class="w-100 custom-height">
                                                    <p class="text-center mt-1" id="name"><?= $item['name']; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No Products available";
                            }
                            ?>
                        </div> <!-- End of row -->
                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "Something Went Wrong";
    }
} else {
    echo "Category Not available";
}
include('includes/footer.php');
?>