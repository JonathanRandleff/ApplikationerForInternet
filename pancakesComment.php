<?php
include_once 'config.php';
session_start();

$res = mysqli_query($link,"SELECT * FROM pancakes_comment");

while($row = mysqli_fetch_array($res)){
    echo "<p style='color:#F26F29;'>".$row['username']."</p>";
    echo $row['comment_text']."<br />";
}
?>
