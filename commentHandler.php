<?php
include_once 'config.php';
session_start();

$meatballsComment = $_POST['meatballsComment'];
$pancakesComment = $_POST['pancakesComment'];
$username = $_SESSION["username"];

    if ($meatballsComment != null) {

        $sql = "INSERT INTO meatballs_comment (comment_text, username)
    VALUES ('$meatballsComment','$username')";

        if ($link->query($sql) === TRUE) {
            Header("Location: meatballs.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
    }
    else if ($pancakesComment != null) {

        $sql = "INSERT INTO pancakes_comment (comment_text, username)
    VALUES ('$pancakesComment', '$username')";

        if ($link->query($sql) === TRUE) {
            Header("Location: pancakes.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
    }
?>