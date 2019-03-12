<?php
include_once('../inc/db.php');
$id = date('z') + 1;
$noodles = mysqli_query($conn, "SELECT * FROM noodleTable");
$count = mysqli_num_rows($noodles);
$nid = ($id % $count) + 1;
$name = mysqli_real_escape_string($conn, $_POST['name']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);

$sql = "INSERT INTO commentTable (name, comment, noodleID) VALUES ('$name', '$comment', '$nid')";
mysqli_query($conn, $sql);
mysqli_close($conn);