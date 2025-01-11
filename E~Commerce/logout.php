<?php

session_start();

if(isset($_SESSION['auth']))
{
    unset($_SESSION['auth']);
    unset($_SESSION['login_user']);
}

$_SESSION['message']="Logged out Successfully";
header("location:index.php");
?>