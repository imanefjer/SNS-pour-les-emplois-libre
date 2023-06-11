<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'artisans';
   // $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
?>