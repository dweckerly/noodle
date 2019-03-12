<?php
include_once('../inc/db.php');
$id = date('z') + 1;
$noodles = mysqli_query($conn, "SELECT * FROM noodleTable");
$count = mysqli_num_rows($noodles);
$nid = ($id % $count) + 1;
$rate = $_POST['rate'];

$sql = "SELECT * FROM noodleTable WHERE noodleID = '$nid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['rateCount'] + 1;
$rating = $row['rateTotal'] + $rate;

$sql = "UPDATE noodleTable SET rateTotal='$rating', rateCount='$count' WHERE noodleID = '$id'";
mysqli_query($conn, $sql);

mysqli_close($conn);