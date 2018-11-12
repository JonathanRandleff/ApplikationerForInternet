<?php
include_once 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = mysqli_query($link,"SELECT* FROM user WHERE username='$username'AND password='$password'");
    $res2 = mysqli_query($link,"SELECT id FROM user WHERE username='$username' limit 1");
    $result = mysqli_fetch_array($res);
    $id = mysqli_fetch_row($res2);

    if($result)
    {
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $id[0];
        $_SESSION["username"] = $username;
        header("location:member.php");
    }
    else
    {
        Header( 'Location: login.php?success=0' );
    }
?>