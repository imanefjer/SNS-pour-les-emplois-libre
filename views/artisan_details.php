<?php
  include '../db/dbhinc.php';
  session_start();
  
$logout="true";
$connexion = "false";
  //if (!isset($_SESSION['USER_NAME'])) {
  //  header("Location: ../../index.php");
//}
   // Retrieve artisan's information
   $artisanId = 3; // Replace with the specific artisan's ID
   $query = "SELECT * FROM Artisans JOIN Users ON Users.user_id = Artisans.artisan_id
   WHERE artisan_id = $artisanId AND Users.role = 'artisan'";
   

   $result = mysqli_query($conn, $query);

   if ($result && mysqli_num_rows($result) > 0) {
      $artisan = mysqli_fetch_assoc($result);
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <header>
                <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong mb-4 ">
                    <div class="container">
                        <a class="navbar-brand" href="./index.php">
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
                              <?php
                                if($logout == "true"){
                                    echo '<li class="nav-item">
                                    <a class="nav-link text-dark" href="logout.php">
                                        <button type="button" class="btn transparent">
                                            Profile
                                        </button>
                                    </a>
                                    </li>';
                                    echo '<li class="nav-item">
                                    <a class="nav-link text-dark" href="logout.php">
                                        <button type="button" class="btn transparent">
                                            logout
                                        </button>
                                    </a> </li>';
                                }
                                if($connexion =="true"){
                                    echo '<li class="nav-item">
                                    <a class="nav-link text-dark" href="./views/login.php">
                                        <button type="button" class="btn transparent">
                                            Connexion
                                        </button>
                                    </a> </li>';
                                    echo '<li class="nav-item">
                                    <a class="nav-link text-dark" href="./views/register.php">
                                        <button type="button" class="btn transparent">
                                            Inscription
                                        </button>
                                    </a> </li>';
                                }
                              ?>
                      
      
                            </ul>
                        </div>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <h1 class="text-light"><a href="../index.html"><?php echo $artisan['username']; ?></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>I'm <?php echo $artisan['username']; ?></h1>
      <p><?php echo $artisan['description']; ?> </p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <p>I work at <?php echo $artisan['company_name']; ?> located in <?php echo $artisan['company_address']; ?>.</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
          <img src="<?php echo $artisan['profile_picture']; ?>" alt="Profile Picture" class="img-fluid">          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $artisan['email']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $artisan['phone_number']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?php echo $artisan['company_address']; ?></span></li>
                </ul>
              </div>
              
            </div>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
<br><br><br><br><br>
    <!-- ======= Services Section ======= -->
    
    <section id="services" class="services">
  <div class="container">

    <div class="section-title">
      <h2>Services</h2>
      <p>Here are my services:</p>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <?php
        $query = "SELECT Services.service_name, Services.service_description
                  FROM Services
                  JOIN Artisan_Services ON Services.service_id = Artisan_Services.service_id
                  WHERE Artisan_Services.artisan_id = $artisanId;";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
          while ($service = mysqli_fetch_assoc($result)) {
            echo '<div class="service-item">';
            echo '<h3>' . $service['service_name'] . '</h3>';
            echo '<p>' . $service['service_description'] . '</p>';
            echo '<div class="make-request">';
            echo '<a href="#" class="btn btn-primary">Make a Request</a>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo '<div class="service-item">';
          echo '<p>No services found.</p>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

  </div>
</section><!-- End Services Section -->






    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="400">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?php 
                echo  $artisan['company_address'];
                ?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php 
                echo  $artisan['email'];
                ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?php 
                echo  $artisan['phone_number'];
                ?></p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form action="php_details.php" method="post" role="form" class="php-email-form">
  <h1>Send me a message</h1>
  <div class="row"></div>
  <div class="form-group">
    <label for="name">Subject</label>
    <input type="text" class="form-control" name="subject" id="subject" required>
  </div>
  <div class="form-group">
    <label for="name">Message</label>
    <textarea class="form-control" name="message" rows="10" required></textarea>
  </div>
  <div class="my-3">
    <div class="loading">Loading</div>
    <div class="error-message"></div>
    <div class="sent-message">Your message has been sent. Thank you!</div>
  </div>
  <div class="text-center"><button type="submit" name="send-message">Send Message</button></div>
</form>






          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/typed.js/typed.umd.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>