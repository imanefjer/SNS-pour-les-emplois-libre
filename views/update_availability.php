<?php
include '../db/dbhinc.php';
echo "sdfef";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the parameters from the AJAX request
  $availability = $_POST['availability'];
  $artisanId = $_POST['artisanId'];
  $serviceId = $_POST['serviceId'];

  // Update the database tables and perform necessary operations
  // ...

  // Return a response indicating the success or failure of the operation
  echo 'success';
} else {
  // Return an error response if the request method is not POST
  echo 'error';
}
?>
