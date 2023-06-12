<?php
include '../db/dbhinc.php';
session_start();
$logout="false";
$user_id = $_SESSION["USER_ID"];
$connexion = "true";
if(isset($_SESSION["USER_NAME"])){
  $logout ="true";
  $connexion = "false";

}
if (!isset($_SESSION['USER_NAME'])) {
    header("Location: ../index.php");
 }
 else{
    if($_SESSION['ROLE'] != "client"){
        header("Location: artisan_profile.php");
    }
 }
 $artisanId = $_GET['artisan_id'];
 $serviceId = $_GET['service_id'];


?>

<!DOCTYPE html>
<html>
<head>
  <title>Book a Service</title>
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="../assets/vendor/aos/aos.css" rel="stylesheet">
<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: rgba(179,173,161,0.4);
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

    .availability-item {
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
    }

    .availability-item button {
      padding: 5px 10px;
      background-color: rgb(63,48,69);
      color: #fff;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
<header>
                <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong mb-4 ">
                    <div class="container">
                        <a class="navbar-brand" href="../index.php">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                            width="134.000000pt" height="30.000000pt" viewBox="0 0 268.000000 100.000000"
                            preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
                            fill="#000000" stroke="none">
                            <path d="M387 948 c-9 -7 -23 -29 -31 -49 -15 -35 -17 -36 -78 -41 -70 -6
                            -107 -22 -153 -66 -29 -27 -31 -33 -30 -104 0 -68 -2 -75 -17 -67 -9 5 -19 19
                            -21 31 -2 13 -5 -4 -6 -38 -1 -52 2 -64 21 -80 23 -19 23 -19 6 2 -10 11 -18
                            27 -18 34 0 9 5 7 15 -6 13 -16 13 -13 -1 15 l-16 34 35 -22 c20 -12 42 -18
                            51 -15 19 7 48 -23 41 -43 -2 -6 1 -14 8 -16 8 -3 6 -11 -7 -26 -27 -30 -17
                            -32 23 -4 21 14 28 23 17 23 -9 0 -16 5 -16 10 0 17 15 12 58 -20 23 -16 48
                            -43 57 -59 8 -16 20 -33 26 -37 6 -3 3 5 -6 20 l-17 26 32 0 c20 0 44 -10 62
                            -25 16 -14 37 -25 46 -24 11 0 12 2 4 6 -6 2 -9 9 -6 14 3 6 -1 18 -10 28 -18
                            20 -13 46 14 72 15 15 18 15 28 -2 14 -21 5 -52 -13 -45 -6 2 -18 0 -26 -5 -9
                            -6 6 -8 45 -5 32 3 63 9 69 15 6 6 25 11 43 11 17 0 37 7 44 15 15 18 6 45
                            -15 45 -8 0 -15 5 -15 11 0 8 -4 8 -12 2 -21 -17 -96 -25 -100 -11 -3 8 -12 7
                            -34 -3 -23 -12 -35 -13 -57 -4 -20 8 -24 14 -15 23 8 8 8 15 0 25 -6 7 -9 23
                            -5 35 4 16 1 22 -11 22 -20 0 -21 22 -1 59 16 31 9 74 -20 117 -25 39 -19 62
                            18 69 18 4 45 2 60 -4 44 -17 45 -13 7 18 -37 32 -36 47 3 37 16 -4 30 -19 40
                            -43 13 -30 16 -33 16 -15 1 34 -42 72 -82 72 -18 0 -41 -6 -50 -12z m-33 -117
                            c17 -18 15 -19 -71 -23 -48 -3 -97 -8 -108 -13 -15 -6 -13 -3 6 13 51 41 145
                            54 173 23z m24 -56 c6 -14 8 -25 3 -25 -10 0 -32 -127 -24 -146 3 -7 -7 -28
                            -21 -45 -28 -33 -29 -53 -1 -25 21 21 40 20 76 -1 20 -12 29 -24 27 -38 -3
                            -17 -12 -20 -60 -23 -32 -2 -58 1 -58 6 0 5 -12 14 -26 21 -25 11 -26 14 -20
                            69 16 135 18 182 9 182 -17 0 -32 -48 -26 -84 5 -35 4 -37 -41 -57 -32 -14
                            -57 -18 -76 -14 -29 6 -30 8 -30 65 0 93 9 106 76 115 43 5 59 3 65 -7 6 -8 9
                            -9 9 -1 0 13 44 31 81 32 18 1 29 -6 37 -24z m21 -194 c-8 -2 -17 -9 -21 -15
                            -13 -19 -20 2 -8 24 10 18 14 19 27 9 12 -11 13 -14 2 -18z"/>
                            <path d="M1128 862 c-45 -50 -102 -134 -164 -242 -26 -47 -52 -86 -56 -88 -4
                            -2 -17 -11 -29 -21 -17 -14 -20 -22 -12 -36 8 -14 3 -35 -24 -91 -46 -100 -51
                            -130 -24 -139 11 -3 25 -4 30 -1 5 3 32 54 61 113 29 60 54 109 55 111 2 2 26
                            12 53 22 l51 20 -6 -83 c-6 -94 4 -141 44 -187 32 -38 45 -38 31 0 -7 22 -7
                            58 1 123 17 139 22 152 59 152 38 0 41 11 7 27 -31 14 -31 18 -1 120 40 143
                            41 162 5 203 -17 19 -35 35 -39 35 -4 0 -23 -17 -42 -38z m-21 -217 c-22 -77
                            -24 -80 -55 -83 -18 -2 -32 -1 -32 3 0 3 12 24 27 48 14 23 37 59 50 80 14 22
                            26 37 28 35 2 -2 -6 -39 -18 -83z"/>
                            <path d="M410 888 c-9 -48 -7 -98 5 -108 8 -7 15 -20 15 -29 1 -11 7 -8 21 12
                            11 15 27 27 35 27 8 0 14 4 14 10 0 12 -32 1 -46 -16 -9 -11 -14 -11 -28 5
                            -21 23 -12 67 14 74 21 5 55 -25 43 -38 -5 -4 -2 -6 5 -4 23 7 17 23 -18 47
                            -28 18 -59 29 -60 20z"/>
                            <path d="M1619 805 c-19 -43 -22 -45 -63 -45 -28 0 -46 -5 -49 -14 -8 -19 1
                            -26 33 -26 15 0 29 -3 32 -6 3 -3 -3 -33 -14 -67 -47 -152 -61 -294 -33 -347
                            9 -16 29 -36 45 -45 39 -20 47 -19 25 5 -35 39 -20 159 47 383 18 62 22 67 48
                            67 16 0 35 -6 42 -14 12 -11 20 -8 52 20 21 18 35 38 31 43 -8 14 -42 14 -50
                            1 -3 -5 -25 -10 -47 -10 l-41 0 6 34 c4 25 1 39 -12 50 -26 23 -30 21 -52 -29z"/>
                            <path d="M71 722 c-6 -12 -11 -27 -11 -34 1 -7 8 0 16 15 9 16 13 31 11 34 -3
                            2 -10 -4 -16 -15z"/>
                            <path d="M580 720 c0 -24 -78 -63 -96 -49 -6 5 -18 3 -28 -4 -16 -12 -16 -14
                            -2 -26 18 -15 22 -36 4 -25 -7 4 -8 3 -4 -4 10 -17 31 -15 47 5 12 15 12 16
                            -3 11 -10 -4 -19 -1 -22 8 -4 10 3 14 24 14 16 0 41 5 55 12 19 9 28 9 37 0
                            17 -17 38 -15 38 3 0 8 -5 14 -11 13 -6 -2 -15 7 -20 20 -5 13 -5 22 1 22 6 0
                            10 -8 11 -17 0 -12 2 -13 6 -5 5 14 -14 42 -28 42 -5 0 -9 -9 -9 -20z"/>
                            <path d="M1304 618 c-39 -76 -74 -203 -81 -290 -5 -67 -4 -78 10 -78 8 0 22
                            -3 30 -6 11 -4 18 12 31 68 39 174 147 323 201 278 29 -24 30 2 2 26 -35 30
                            -66 31 -102 2 l-28 -22 7 29 c5 19 3 31 -6 36 -26 17 -38 8 -64 -43z"/>
                            <path d="M1700 625 c-6 -14 -15 -37 -21 -52 -20 -52 -39 -187 -33 -233 7 -42
                            48 -100 71 -100 5 0 7 33 5 73 -3 52 3 101 22 180 14 60 26 114 26 121 0 11
                            -39 36 -56 36 -2 0 -9 -11 -14 -25z"/>
                            <path d="M1862 634 c-58 -41 -67 -120 -22 -201 33 -58 38 -103 15 -127 -27
                            -27 -55 -29 -86 -7 -30 22 -50 12 -28 -15 42 -51 155 -59 190 -13 27 35 23 71
                            -16 142 -42 76 -43 100 -10 150 34 49 49 48 40 -2 -5 -29 -3 -40 9 -44 18 -7
                            32 9 41 45 6 22 1 33 -23 58 -34 34 -74 39 -110 14z"/>
                            <path d="M2122 620 c-62 -38 -122 -157 -122 -243 0 -49 13 -73 50 -92 37 -19
                            54 -12 94 41 l34 44 6 -45 c5 -31 15 -51 33 -65 14 -11 28 -20 32 -20 3 0 6
                            42 7 93 1 76 7 108 32 181 30 84 31 91 15 108 -20 22 -31 23 -54 2 -16 -15
                            -20 -15 -41 0 -29 21 -46 20 -86 -4z m94 -77 c-19 -79 -146 -271 -146 -221 0
                            75 96 248 138 248 10 0 12 -7 8 -27z"/>
                            <path d="M2525 588 c-28 -29 -64 -69 -79 -88 l-27 -35 17 40 c9 22 18 47 21
                            55 6 20 -32 54 -51 47 -8 -3 -31 -40 -52 -83 -45 -94 -55 -180 -27 -234 32
                            -61 53 -52 102 42 42 81 146 228 161 228 4 0 -6 -36 -21 -81 -37 -103 -40
                            -202 -8 -243 11 -14 23 -26 27 -26 4 0 7 30 8 68 1 47 10 94 32 160 39 112 40
                            151 9 180 -35 33 -55 27 -112 -30z"/>
                            <path d="M420 612 c0 -12 19 -26 26 -19 2 2 -2 10 -11 17 -9 8 -15 8 -15 2z"/>
                            <path d="M60 513 c0 -24 23 -73 35 -73 7 0 18 -6 24 -14 9 -11 5 -15 -24 -20
                            -43 -8 -51 -23 -31 -60 9 -18 16 -23 19 -14 4 8 6 7 6 -5 1 -10 -5 -20 -13
                            -23 -8 -3 -17 -26 -21 -51 -3 -24 -13 -62 -20 -83 -13 -36 -11 -50 6 -50 4 0
                            12 24 19 53 24 116 30 129 45 113 17 -16 20 -41 5 -31 -13 8 -12 4 1 -50 12
                            -48 39 -70 39 -32 0 16 -3 18 -9 9 -11 -19 -22 39 -15 78 8 36 -3 83 -16 75
                            -6 -3 -10 0 -10 7 0 10 17 12 76 8 67 -4 77 -8 88 -29 9 -15 16 -20 20 -12 4
                            6 3 11 -2 11 -6 0 -13 7 -16 16 -4 12 -2 15 9 10 9 -3 15 0 15 9 0 8 -3 15 -7
                            16 -5 0 -19 2 -33 4 -14 1 -29 -1 -35 -4 -17 -12 -75 -12 -75 0 0 6 8 8 19 4
                            13 -4 23 0 29 12 8 14 23 18 71 18 44 0 55 2 38 8 -12 5 -49 7 -83 4 -49 -4
                            -65 -1 -85 14 -20 16 -21 18 -4 13 19 -7 19 -6 2 12 -14 16 -19 17 -26 5 -7
                            -10 -11 -8 -17 10 -4 13 -8 27 -9 31 0 11 -15 22 -15 11z m58 -132 c9 -5 3 -8
                            -17 -9 -17 0 -31 4 -31 9 0 11 30 12 48 0z"/>
                            <path d="M532 433 c-1 -7 -8 -13 -16 -13 -14 0 -14 -8 -2 -207 3 -48 0 -63
                            -11 -67 -8 -4 -19 -4 -24 0 -17 10 -9 -16 11 -36 21 -21 94 -28 105 -10 4 6
                            -13 10 -44 10 -27 0 -52 4 -55 9 -3 5 18 7 47 5 38 -2 46 0 30 6 -29 12 -33
                            30 -36 185 -1 72 -4 124 -5 118z m-5 -230 c-3 -10 -5 -2 -5 17 0 19 2 27 5 18
                            2 -10 2 -26 0 -35z"/>
                            <path d="M270 386 c0 -2 9 -6 20 -9 11 -3 18 -1 14 4 -5 9 -34 13 -34 5z"/>
                            <path d="M361 374 c0 -11 3 -14 6 -6 3 7 2 16 -1 19 -3 4 -6 -2 -5 -13z"/>
                            <path d="M453 354 c-18 -20 -33 -41 -33 -47 0 -7 -5 -29 -11 -49 -9 -33 -14
                            -38 -40 -38 -29 0 -30 0 -14 30 17 33 21 105 5 95 -5 -3 -11 2 -11 12 -1 10
                            -4 5 -8 -12 -4 -16 -3 -40 2 -52 7 -16 5 -29 -7 -47 -22 -34 -21 -36 13 -36
                            31 0 49 -14 31 -25 -8 -5 -100 20 -119 32 -3 2 5 13 16 26 27 29 43 61 43 84
                            0 10 -9 0 -19 -22 -10 -22 -30 -51 -45 -64 -35 -33 -33 -47 9 -55 19 -4 37
                            -11 40 -17 4 -6 -3 -7 -19 -3 -25 6 -26 5 -16 -20 10 -27 5 -32 -18 -18 -8 5
                            -10 16 -6 27 5 13 4 16 -4 11 -30 -18 -11 -43 52 -70 79 -34 132 -33 129 2 -2
                            14 3 22 12 22 26 0 16 21 -15 31 -32 12 -35 16 -20 39 7 12 12 11 30 -5 14
                            -12 19 -14 15 -4 -3 8 6 45 20 83 27 74 30 90 15 66 -13 -20 -13 1 0 34 5 14
                            8 26 7 26 -1 0 -17 -17 -34 -36z"/>
                            </g>
                            </svg>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="./views/commentcamarche.php">
                                        <button type="button" class="btn transparent">
                                            Comment ça marche
                                        </button>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#service">
                                        <button type="button" class="btn transparent">
                                            Services
                                        </button>
                                    </a>
                                </li>
                                <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                            <ul class="navbar-nav ml-auto">
                              
      
                            </ul>
                        </div>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
  <div class="container">
    <h1>Book a Service</h1>
    <div id="availabilities-container">
    <?php
  // Retrieve the artisan ID and service ID from the URL
  $artisanId = $_GET['artisan_id'];
  $serviceId = $_GET['service_id'];

  $query = "SELECT DISTINCT a.date, a.start_time, a.end_time
  FROM Artisan_Services AS s
  INNER JOIN Availabilities AS a ON s.artisan_id = a.artisan_id
  WHERE s.artisan_id = $artisanId";

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
        echo '<div class="availability-item">';
        echo "<p>$date, $startTime - $endTime</p>";
        echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?artisan_id='.$artisanId.'&service_id='.$serviceId.'">';
        echo '<input type="hidden" name="availability" value="'.$date.' '.$startTime.'">';
        echo '<input type="hidden" name="artisanId" value="'.$artisanId.'">';
        echo '<input type="hidden" name="serviceId" value="'.$serviceId.'">';
        echo '<button type="submit" name="book">Book This</button>';
        echo '</form>';
        echo '</div>';
      }
    } else {
      echo "<p>No availabilities found</p>";
    }
  } else {
    echo "Query execution failed: " . mysqli_error($conn);
  }

  // Handle the booking request
  if (isset($_POST['book'])) {
    $availability = $_POST['availability'];
    $artisanId = $_POST['artisanId'];
    $serviceId = $_POST['serviceId'];
    
   // Handle the booking request
if (isset($_POST['book'])) {
  $availability = $_POST['availability'];

  // Delete the selected availability from the Availabilities table
  $deleteQuery = "DELETE FROM Availabilities WHERE artisan_id = $artisanId AND date = DATE('$availability') AND start_time = TIME('$availability')";
  $deleteResult = mysqli_query($conn, $deleteQuery);

  $locationQuery = "SELECT company_address FROM Artisans WHERE artisan_id = $artisanId";
  $locationResult = mysqli_query($conn, $locationQuery);
  $locationRow = mysqli_fetch_assoc($locationResult);
  $location = $locationRow['company_address'];
  
  // Add a request to the Requests table
  $insertQuery = "INSERT INTO Requests (user_id,  service_id, date_requested, status, location) 
  VALUES ('$user_id', '$serviceId', NOW(), 'Pending', '$location')";
$insertResult = mysqli_query($conn, $insertQuery);


  echo $insertResult;



  // Check if the database modifications were successful
  if ($deleteResult && $insertResult) {
    // Modifications were successful, you can redirect the user or display a success message
    echo "Booking successful!";
  } else {
    // Modifications failed, you can display an error message or handle the failure case
    echo "Booking failed!";
  }
}

  }
?>

    
  </div>


  <script>
    function bookAvailability(selectedAvailability) {
      // Perform your booking logic here
      console.log("Booking availability:", selectedAvailability);
    }
  </script>
</body>
</html>
