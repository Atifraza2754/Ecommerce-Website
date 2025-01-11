<?php 
session_start();
require("../config/dbconnect.php");

if(isset($_POST['login']))
{
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    $login_query="SELECT * from users WHERE email='$email' AND password='$password'";
    $query_run=mysqli_query($conn,$login_query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $_SESSION['auth']=true;

        $row=mysqli_fetch_array($query_run);
        $user_id=$row['user_id'];
        $username=$row['name'];
        $useremail=$row['email'];
        $role_as=$row['role_as'];

        $_SESSION['login_user'] = [
            'user_id' => $user_id,
            'name' => $username,
            'email' => $useremail
        ];

        //check admin role
        $_SESSION['role_as']=$role_as;
        if($role_as == 1){
            $_SESSION['message']="Welcome to Admin Dashboard";
            //redirect to admin dashboard
            header("location: ../admin/index.php");
        }
        else
        {
            //redirect to user panel
            $_SESSION['message']="Logged In Successfully";
            header("location: ../index.php");
        }

    }
    else
    {
        $_SESSION['message']="Invalid Credentials";
        header("location: ../login.php");
    }
}

?>