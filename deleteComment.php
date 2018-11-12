<?php
include_once 'config.php';
session_start();

$commentID = $_POST['id'];
$page = $_POST['page'];

if ($page === "meatballs") {
    $res = mysqli_query($link,"SELECT* FROM meatballs_comment WHERE id='$commentID' limit 1");
    $row = mysqli_fetch_array($res);

    if ($_SESSION[username] === $row['username']) {
        mysqli_query($link,"DELETE FROM meatballs_comment WHERE id='$commentID' limit 1");
        Header("Location: meatballs.php");
    }
}
else if ($page === "pancakes") {
    $res = mysqli_query($link,"SELECT* FROM pancakes_comment WHERE id='$commentID' limit 1");
    $row = mysqli_fetch_array($res);

    if ($_SESSION[username] === $row['username']) {
        mysqli_query($link,"DELETE FROM pancakes_comment WHERE id='$commentID' limit 1");
        Header("Location: pancakes.php");
    }
}

?>