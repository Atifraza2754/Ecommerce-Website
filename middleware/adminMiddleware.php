<?php
include("../functions/AllFunctions.php");

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    {
        redirect('../index.php','You have no permission to access this page');
    }
}
else
{
    //if user try to access admin without login redirect him to login page 
    redirect('../login.php','Login to continue');
}


?>