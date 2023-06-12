<!DOCTYPE html>
<html>
<head>
    <?php
    
    include_once '../db/dbhinc.php';
    session_start();
    $logout="false";
    $connexion = "true";
    if(isset($_SESSION["USER_ID"])){
      $logout ="true";
      $connexion = "false";
    }
    
    $artisan_id = $_GET['artisan_id'];
    
    $result = mysqli_query($conn,"SELECT AVG(rating) as avg, artisan_id FROM reviews GROUP BY artisan_id HAVING artisan_id = '$artisan_id' ");
    $res =mysqli_fetch_array($result);
    $result1 = mysqli_query($conn,"SELECT count(*) as cnt,artisan_id FROM reviews GROUP BY artisan_id HAVING artisan_id = '$artisan_id' ");
    $avg=$res['avg'];
    
    $res1 =mysqli_fetch_array($result1);
    $cnt=$res1['cnt'];


    //$GET[artisan_id]

    ?>

<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8" />
    <title>Review & Rating System in PHP & Mysql using Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  margin: 0 auto; /* Center website */
  max-width: 800px; /* Max width */
  padding: 20px;
}

.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #04AA6D;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>
</head>
<body>


<?php
echo "<p>$avg average based on $cnt reviews.</p>"
?>
<style amp-custom>
  .rating {
    --star-size: 3;  /* use CSS variables to calculate dependent dimensions later */
    padding: 0;  /* to prevent flicker when mousing over padding */
    border: none;  /* to prevent flicker when mousing over border */
    unicode-bidi: bidi-override; direction: rtl;  /* for CSS-only style change on hover */
    text-align: left;  /* revert the RTL direction */
    user-select: none;  /* disable mouse/touch selection */
    font-size: 3em;  /* fallback - IE doesn't support CSS variables */
    font-size: calc(var(--star-size) * 1em);  /* because `var(--star-size)em` would be too good to be true */
    cursor: pointer;
    /* disable touch feedback on cursor: pointer - http://stackoverflow.com/q/25704650/1269037 */
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    -webkit-tap-highlight-color: transparent;
    margin-bottom: 1em;
    
  }
  .form{
    margin-left: 50%;
  }
  /* the stars */
  .rating > label {
    display: inline-block;
    position: relative;
    width: 1.1em;  /* magic number to overlap the radio buttons on top of the stars */
    width: calc(var(--star-size) / 3 * 1.1em);
  }
  .rating > *:hover,
  .rating > *:hover ~ label,
  .rating:not(:hover) > input:checked ~ label {
    color: transparent;  /* reveal the contour/white star from the HTML markup */
    cursor: inherit;  /* avoid a cursor transition from arrow/pointer to text selection */
  }
  .rating > *:hover:before,
  .rating > *:hover ~ label:before,
  .rating:not(:hover) > input:checked ~ label:before {
    content: "★";
    position: absolute;
    left: 0;
    color: gold;
  }
  .rating > input {
    position: relative;
    transform: scale(3);  /* make the radio buttons big; they don't inherit font-size */
    transform: scale(var(--star-size));
    /* the magic numbers below correlate with the font-size */
    top: -0.5em;  /* margin-top doesn't work */
    top: calc(var(--star-size) / 6 * -1em);
    margin-left: -2.5em;  /* overlap the radio buttons exactly under the stars */
    margin-left: calc(var(--star-size) / 6 * -5em);
    z-index: 2;  /* bring the button above the stars so it captures touches/clicks */
    opacity: 0;  /* comment to see where the radio buttons are */
    font-size: initial; /* reset to default */
  }
  form.amp-form-submit-error [submit-error] {
    color: red;
  }
  </style>
<hr style="border:3px solid #f1f1f1; margin-right:65%">

<div class="row">
<form id="rating" method="post" action="rateTreatment.php" >
  <fieldset class="rating">
    <input name="rating" type="radio" id="rating5" value="5" on="change:rating.submit">
    <label for="rating5" title="5 stars">☆</label>

    <input name="rating" type="radio" id="rating4" value="4" on="change:rating.submit">
    <label for="rating4" title="4 stars">☆</label>

    <input name="rating" type="radio" id="rating3" value="3" on="change:rating.submit">
    <label for="rating3" title="3 stars">☆</label>

    <input name="rating" type="radio" id="rating2" value="2" on="change:rating.submit" >
    <label for="rating2" title="2 stars">☆</label>

    <input name="rating" type="radio" id="rating1" value="1" on="change:rating.submit">
    <label for="rating1" title="1 stars">☆</label>
  </fieldset>
  <div class="form-group">
    <label for="exampleFormControlTextarea1" name ="rating_text">Any comment ?</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <input class="btn btn-primary btni"  style="background-color:black; border:none; margin-left:50px" type="submit" name="submit" value="Submit Review">
  
  
  
</form>
<?php

if(isset($_POST['submit'])){
    if(!empty($_POST['rating'])) {
        $rating =$_POST['rating'];
        $user_id=$_SESSION['USER_ID'];
        $review_text= $_POST['rating_text'];
        $date_reviewed = $date = date('m/d/Y ', time());
        echo '<div class="alert alert-success">
            <strong>Success!</strong> 
        </div>';
        $query= "INSERT INTO RVIEWES (user_id, artisan_id, rating, review_text, datereviewed)
        VALUES ('$user_id', '$artisan_id', '$rating', '$review_text', '$date_reviewed');"
    } else {
        echo '<div class="alert alert-danger">
        <strong>Please Rate</strong> 
      </div>';
        
}
}
?>

</div>

</body>
</html>
