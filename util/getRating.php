<?php
include_once('../inc/db.php');
$id = date('z') + 1;
$noodles = mysqli_query($conn, "SELECT * FROM noodleTable");
$count = mysqli_num_rows($noodles);
$nid = ($id % $count) + 1;
$sql = "SELECT * FROM noodleTable WHERE noodleID = '$nid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$rating = $row['rateTotal'] / $row['rateCount'];
$rating = round($rating, 1);
echo $rating;
mysqli_close($conn);