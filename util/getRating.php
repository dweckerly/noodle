<?php
include_once('../inc/db.php');
$id = date('z') + 1;
if($id > 101) {
    $id = $id - 101;
}

$sql = "SELECT * FROM noodleTable WHERE noodleID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$rating = $row['rateTotal'] / $row['rateCount'];
$rating = round($rating, 1);
echo $rating;
mysqli_close($conn);