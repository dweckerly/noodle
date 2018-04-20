<?php
include_once('../inc/db.php');
$id = date('z') + 1;
if($id > 101) {
    $id = $id - 101;
}
$name = mysqli_real_escape_string($conn, $_POST['name']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);

$sql = "INSERT INTO commentTable (name, comment, noodleID) VALUES ('$name', '$comment', '$id')";
mysqli_query($conn, $sql);
mysqli_close($conn);