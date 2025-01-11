<?php
session_start();
require("../config/dbconnect.php");

if(isset($_POST['register']))
{    
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);

    //check if email already registered
    $check_email="SELECT email from users WHERE email='$email'";
    $run_email_query=mysqli_query($conn,$check_email);
    if(mysqli_num_rows($run_email_query) > 0)
    {
        $_SESSION['message']="Email Already Registered";
        header("location:../register.php");
    }
    else
    {
    //Match confrim password
    if($password == $cpassword)
    {
        $insert_query="INSERT into users (name,phone,email,password) values ('$name','$phone','$email','$password')";
        $query_run=mysqli_query($conn,$insert_query);

        if($query_run)
        {
            $_SESSION['message']="Registered Successfully";
            header("location:../login.php");
        }
        else
        {
            $_SESSION['message']="Something went Wrong";
            header("location:../register.php");
        }
    }
    else
    {
        $_SESSION['message']="password does not matched";
        header("location:../register.php");
    }
}
}

?>