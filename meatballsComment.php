
<?php
include_once 'config.php';
session_start();
/**
$res2 = mysqli_query($link,"SELECT comment_text FROM meatballs_comment");
$result = mysqli_fetch_array($res);
$id = mysqli_fetch_row($res2);
 **/

$res = mysqli_query($link,"SELECT * FROM meatballs_comment");

while($row = mysqli_fetch_array($res)){
    echo "<p style='color:#F26F29;'>".$row['username']."</p>";
    echo $row['comment_text']."<br />";
}
?>
