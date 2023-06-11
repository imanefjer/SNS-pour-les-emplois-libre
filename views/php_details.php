<?php
include "artisan_details.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $user_id = $_SESSION['USER_ID'];
  $date_sent = date('Y-m-d H:i:s');
  
  $query = "INSERT INTO Messages (user_id, artisan_id, message_text, date_sent)
            VALUES ('$user_id', '{$artisan['artisan_id']}', '$message', '$date_sent')";
  
  if (mysqli_query($conn, $query)) {
    echo "<div class='alert alert-success'>Your message has been sent. Thank you!</div>";
  } else {
    echo "<div class='alert alert-success'>Your message has been sent. Thank you!</div>";
  }
}
?>
