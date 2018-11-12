<?php
include_once 'config.php';
session_start();

$res = mysqli_query($link,"SELECT * FROM pancakes_comment");

while($row = mysqli_fetch_array($res)) {
    echo "<p style='color:#F26F29;'>".$row['username']."</p>";
    echo $row['comment_text']."  ";
    if ($row['username'] === $_SESSION["username"]) {
        $id = $row['id'];
        echo '<form action="deleteComment.php" method="post">
            <input type="hidden" name="id" value="'.$id.'">
            <input type="hidden" name="page" value="pancakes">
            <input type="submit" class="delete" name="button" value="Delete"/>
            </form>';
    }
    echo "<br />";
}
?>
