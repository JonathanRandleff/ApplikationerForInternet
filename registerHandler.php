<?php
include_once 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password != $password2) {
        Header("Location: register.php?match=0");
        exit;
    }

    $res = mysqli_query($link,"select* from user where username='$username'");
    $result=mysqli_fetch_array($res);

    if($result)
    {
        Header("Location: register.php?taken=1");

    }

    $sql = "INSERT INTO user (username, password)
    VALUES ('$username', '$password')";

    if ($link->query($sql) === TRUE) {
        Header("Location: login.php?success=1");
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
?>