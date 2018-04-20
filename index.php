<?php
include_once('inc/db.php');
$id = date('z') + 1;
if($id > 101) {
    $id = $id - 101;
}
$sql = "SELECT * FROM noodleTable WHERE noodleID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row['rateCount'] != 0) {
    $rating = $row['rateTotal'] / $row['rateCount']; 
    $rating = round($rating, 1);
} else {
    $rating = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A Noodle A Day</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>
<body>
    <div id="title-div" class="noodle-font" align="center">
        <h1 id="title">a noodle a day</h1>
        <p id="date"><?php echo date('m/d/Y');?></p>
    </div>
    <div id="noodle-container" class="container" align="center">
        <img id="noodle" class="img-fluid" src="img/<?php echo $row['noodleID'];?>.jpg">
    </div>
    <div align="center">
        <p id="saying">Here's your noodle. <?php 
        if($rating != 0) {
            echo $rating;?> <i id="rating-star" class="fa fa-star"></i>s</p>
        <?php
        } else {?> Not yet rated... :(</p>
        <?php
        }
        ?>
    </div>
    <div id="rate-box" align="center">
            <h3>Rate this noodle.</h3>
            <i id="1-star" class="fa fa-star-o"></i>
            <i id="2-star" class="fa fa-star-o"></i>
            <i id="3-star" class="fa fa-star-o"></i>
            <i id="4-star" class="fa fa-star-o"></i>
            <i id="5-star" class="fa fa-star-o"></i>
    </div>
    <div id="rated" align="center">
        <h3>Thanks!</h3>
    </div>
    <div id="leav-a-comment-container" align="center">
        <div id="leave-a-comment" class="col-sm-4 col-md-3">
            <h4>Leave a comment.</h4>
            <div class="form-group">
                <input id="comment-name" type="text" class="form-control" placeholder="Name" value="">
            </div>
            <div class="form-group">
                <textarea id="comment-text" class="form-control" rows="3" placeholder="Wow, that's some nice noodles!" value=""></textarea>
            </div>
            <button id="comment-btn" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <div id="comment-container" align="center">
<?php

$sql = "SELECT * FROM commentTable WHERE noodleID = '$id'";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {?>
        <div class="comment col-sm-4 col-md-3">
            <h5 class="float-left"><?php echo $row['name'];?> said:</h5>
            <br /><br />
            <p><?php echo $row['comment'];?></p>
        </div>
<?php
    }
} else { ?>
    <div id="no-comment" class="comment col-sm-4 col-md-3">
        <h4 style="margin-bottom: 1em;">No comments... :(</h4>
    </div>
<?php
}
?>
    </div>

    <footer>
        <br /><br />
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</html>
<?php
mysqli_close($conn);
?>