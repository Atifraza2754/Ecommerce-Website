<?php
require('functions/userFunction.php');
include('includes/header.php');
include('includes/slider.php');

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <hr>
                <div class="owl-carousel">
                    <?php
                    //fetch trending products
                    $trendingProducts = GetTrendingProducts();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?>
                            <div class="item">
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
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- about us page -->
<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline"></div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ducimus possimus rem recusandae adipisci sint cupiditate deleniti maiores, deserunt aliquid ratione ullam laborum, asperiores eaque. Et amet accusamus impedit dolor?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ducimus possimus rem recusandae adipisci sint cupiditate deleniti maiores, deserunt aliquid ratione ullam laborum, asperiores eaque. Et amet accusamus impedit dolor?
                    <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque hic deleniti libero quia corrupti culpa est voluptatem velit numquam ratione, incidunt esse ullam voluptatibus reiciendis quo voluptas molestiae illo harum?
                </p>
            </div>
        </div>
    </div>
</div>
<!-- end about us -->


<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">EcoShop</h4>
                <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Home</a> <br>
                <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> About us</a> <br>
                <a href="MyCart.php" class="text-white"><i class="fa fa-angle-right"></i> My Cart</a> <br>
                <a href="AllCategories.php" class="text-white"><i class="fa fa-angle-right"></i> Categories</a> <br>
            </div>
            <div class="col-md-3 text-white">
                <h4>Address</h4>
                <p>
                    #H:NO 65/100 HDA Banglows,
                    HDA Phase-1, Naseem Nagar,
                    Qasimabad Hyderabad,
                </p>
                <a href="tel:+923042754071"><i class="fa fa-phone"></i> +923042754071</a><br>
                <a href="mailto: atifrazait@gmail.como"><i class="fa fa-envelope"></i> atifrazait@gmail.com</a>
            </div>
            <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.0500357471024!2d68.33481572403298!3d25.40313567333119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x394c70a63115b6b9%3A0xc4f71ed7632f69b4!2sAbdullah%20Town%20Qasimabad%2C%20Hyderabad%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1725653957967!5m2!1sen!2s" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. Copyright @ Aatifraza - <?= date('Y') ?></p>
    </div>
</div>



<?php include('includes/footer.php'); ?>

<!-- owl carousel js -->
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    });
</script>