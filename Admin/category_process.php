<?php
//include database
require("../config/dbconnect.php");
include('../functions/AllFunctions.php');
if(isset($_POST['add_category']))
{
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $description=$_POST['description'];
    $meta_title=$_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keyword=$_POST['meta_keyword'];    
    $status=isset($_POST['status']) ? '1':'0';
    $popular=isset($_POST['popular']) ? '1':'0';

    $image=$_FILES['image']['name'];
    $path="../uploads";
    $img_extension= pathinfo($image,PATHINFO_EXTENSION);
    $filename = time().'.'.$img_extension;

    $categ_query="INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image)
    VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$status','$popular','$filename')";
    $run_query=mysqli_query($conn,$categ_query);

    if($run_query)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add_category.php","Category Added Successfully");
    }
    else
    {
        redirect("add_category.php","Error in Query");

    }
}


//Update Category Code Here
else if(isset($_POST['update_category']))
{
    $category_id=$_POST['category_id'];
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $description=$_POST['description'];
    $meta_title=$_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_keyword=$_POST['meta_keyword'];    
    $status=isset($_POST['status']) ? '1':'0';
    $popular=isset($_POST['popular']) ? '1':'0';

    $new_image=$_FILES['image']['name'];
    $old_image=$_POST['old_image'];
    $path="../uploads";


    if($new_image != "")
    {
        $update_filename = $new_image ;
    }
    else
    {
        $update_filename = $old_image ;
    }

    $upadate_query = "UPDATE categories SET name='$name',slug='$slug',description='$description',meta_title='$meta_title',
    meta_description='$meta_description',meta_keywords='$meta_keyword',status='$status',popular='$popular',image='$update_filename'
    WHERE cat_id='$category_id'";

    $upadate_query_run=mysqli_query($conn,$upadate_query);
    if($upadate_query)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$new_image); //move new updated image in folder
            if(file_exists("../uploads/".$old_image)) //check if old image exist after update of image
            {
                unlink("../uploads/".$old_image); //delete old image after updating image
            }
        }
        //redirect to view categories page and show message there
        redirect("edit_category.php?id=$category_id","Category Updated Successfully");
    }
    else
    {
        redirect("edit_category.php?id=$category_id","Error in Query");
    }

}


//Delete Category 
if(isset($_POST['delete_category']))
{
    $category_id=mysqli_real_escape_string($conn,$_POST['category_id']);
    //fetch image from database
    $cat_query="SELECT * from categories WHERE cat_id='$category_id'";
    $cat_query_run=mysqli_query($conn,$cat_query);
    $category_row=mysqli_fetch_assoc($cat_query_run);
    $image=$category_row['image'];

    $delete_query="DELETE from categories WHERE cat_id='$category_id'";
    $run_query=mysqli_query($conn,$delete_query);


    if($run_query)
    {
        if(file_exists("../uploads/".$image)) //check if image exist after deleting record
        {
            unlink("../uploads/".$image); //delete that image whose record is deleting now
        }

        echo 200;
/*         redirect("View_categories.php","Category Deleted"); */

    }
    else
    {
        echo 500;
/*         redirect("View_categories.php","Error in Query"); */

    }
}

?>