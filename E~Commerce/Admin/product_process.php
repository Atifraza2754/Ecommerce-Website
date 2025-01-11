<?php
//include database
require("../config/dbconnect.php");
include('../functions/AllFunctions.php');
if (isset($_POST['add_product'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $small_description = mysqli_real_escape_string($conn, $_POST['small_description']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $original_price = mysqli_real_escape_string($conn, $_POST['original_price']);
    $selling_price = mysqli_real_escape_string($conn, $_POST['selling_price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['qty']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keyword']);
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    // Handle image upload
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $img_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $img_extension;

    // SQL query with proper escaping
    $product_query = "INSERT INTO products (category_id, name, slug, small_description, description, original_price, selling_price,
        qty, meta_title, meta_description, meta_keywords, status, trending, image)
        VALUES ('$category_id', '$name', '$slug', '$small_description', '$description', '$original_price', '$selling_price', 
        '$quantity', '$meta_title', '$meta_description', '$meta_keyword', '$status', '$trending', '$filename')";

    $run_query = mysqli_query($conn, $product_query);

    if ($run_query) {
        // Push file along with filename into the uploads path
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("add_products.php", "Product Added Successfully");
    } else {
        redirect("add_products.php", "Error in Query: " . mysqli_error($conn));
    }
}

//Update Product
elseif(isset($_POST['update_product']))
{
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $small_description = mysqli_real_escape_string($conn, $_POST['small_description']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $original_price = mysqli_real_escape_string($conn, $_POST['original_price']);
    $selling_price = mysqli_real_escape_string($conn, $_POST['selling_price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['qty']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keyword']);    
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';

    $path = "../uploads";

    $new_image = $_FILES['image']['name']; //fetch file name
    $old_image = $_POST['old_image'];  //here fetch old image

    if($new_image != "")  //check new image is not equal null 
    {
        $image_extention = pathinfo($new_image, PATHINFO_EXTENSION); //update or rename new file name
        $update_filename = time().'.'.$image_extention;
    }
    else
    {
        $update_filename = $old_image;  //otherwise add old filename in new file name
    }

    // Update Query with escaped values
    $update_product = "UPDATE products SET 
        category_id='$category_id', 
        name='$name',
        slug='$slug',
        small_description='$small_description',
        description='$description',
        meta_description='$meta_description',
        meta_keywords='$meta_keyword',
        status='$status',
        trending='$trending',
        original_price='$original_price',
        selling_price='$selling_price',
        qty='$quantity',
        image='$update_filename' 
        WHERE product_id='$product_id'";

    $run_update_query = mysqli_query($conn, $update_product);
    
    if($run_update_query)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename); //move new image in upload folder
            if(file_exists("../uploads/".$old_image)) //check if old image exists in upload folder
            {
                unlink("../uploads/".$old_image); //unlink/remove old image from uploads folder
            }
        }
        redirect("edit_product.php?id=$product_id", "Product Updated Successfully");
    }
    else
    {
        redirect("edit_product.php?id=$product_id", "Error in Query");        
    }
} //end update

//start delete query
elseif(isset($_POST['delete_product']))
{
    $product_id=mysqli_real_escape_string($conn,$_POST['product_id']);
    //fetch image from database
    $product_query="SELECT * from products WHERE product_id='$product_id'";
    $product_query_run=mysqli_query($conn,$product_query);
    $product_row=mysqli_fetch_assoc($product_query_run);
    $image=$product_row['image'];

    $delete_query="DELETE from products WHERE product_id='$product_id'";
    $product_run_query=mysqli_query($conn,$delete_query);


    if($product_run_query)
    {
        if(file_exists("../uploads/".$image)) //check if image exist after deleting record
        {
            unlink("../uploads/".$image); //delete that image whose record is deleting now
        }

        echo 200;
        /* redirect("View_products.php","Product Deleted Successfully"); */

    }
    else
    {
        echo 500;
        /* redirect("View_products.php","Error in Query"); */

    }
}
else
{
    header("Location: ../index.php");
}

?>