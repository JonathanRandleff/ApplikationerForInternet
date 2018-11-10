<?php
include_once 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = mysqli_query($link,"select* from user where username='$username'and password='$password'");
    $result=mysqli_fetch_array($res);
    if($result)
    {
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $username;
        header("location:member.php");
    }
    else
    {
        Header( 'Location: login.php?success=0' );
    }
?>