<?php
include '../db/dbhinc.php';
    session_start();

$logout="false";
$connexion = "true";
//if(isset($_SESSION["USER_NAME"])){
  
 // $logout ="true";
  //$connexion = "false";

//}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book a Service</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    header {
      /* Add your header styles here */
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    #availabilities-container {
      /* Add styles for displaying availabilities here */
    }

    #booking-form {
      margin-top: 20px;
    }

    #booking-form label,
    #booking-form select,
    #booking-form button {
      display: block;
      margin-bottom: 10px;
    }

    #booking-form button {
      padding: 10px 20px;
      background-color: #428bca;
      color: #fff;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <!-- Add your header content here -->
  </header>
  <div class="container">
    <h1>Book a Service</h1>
    <div id="availabilities-container">
      <?php
      

      // Retrieve the selected artisan's availabilities
      $artisanId = $_SESSION["ARTISAN_ID"]; // You need to pass the selected artisan ID from the previous page

      $result = mysqli_query($conn, $query);

// Check if the query was executed successfully
if ($result) {
  // Check if there are availabilities for the selected artisan
  if (mysqli_num_rows($result) > 0) {
    // Display the availabilities as options in the form select field
    while ($row = mysqli_fetch_assoc($result)) {
      $date = $row['date'];
      $startTime = $row['start_time'];
      $endTime = $row['end_time'];

      echo "<option value='$date $startTime'>$date, $startTime - $endTime</option>";
    }
  } else {
    echo "<option>No availabilities found</option>";
  }
} else {
  echo "Query execution failed: " . mysqli_error($conn);
}


      ?>
    </div>
    <form id="booking-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label for="availability">Select an Availability:</label>
      <select name="availability" id="availability">
        <?php
        if (isset($_POST['availability'])) {
          $selectedAvailability = $_POST['availability'];
          echo "<option value='$selectedAvailability' selected>$selectedAvailability</option>";
        } else {
          echo include($_SERVER['PHP_SELF']);
        }
        ?>
      </select>
      <button type="submit">Book</button>
    </form>
  </div>
</body>
</html>