<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Responsive Navbar | CodingNepal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/problems.css">
    
  </head>
  
    
   

<body>
  <form>
    <div class="container" id ="blur">
        <nav>
          <input type="checkbox" id="check">
          <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
          </label>
          <label class="logo">YouArt</label>
          <ul>
            <li><a  href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a class="active" href="#">Feedback</a></li>
          </ul>
        </nav>
      
        
          <div class="artisan-profile">
            <img src="../images/plomber.jpg" alt="Artisan">
            <div class="inter">
              <h2 ><a >John Doe</a></h2>
              <p class="artisan-speciality">Plumbing, Anfa</p>
              <p class="artisan-speciality">Mohammed is a skilled plumber with years of experience in the field. He is known for his attention to detail and ability to quickly diagnose and solve plumbing problems. Whether you need a leaky faucet fixed.</p>
              <div><input type="button" value="Rate" class="rateBtn" onclick="toggle()" ></div>
            </div>
            
          </div>
          
          
          
          
    </div>
    
    <div class="pupup" id="pop">
      <h2>hhhhhhhhhhhh</h2>
      <p>hhhhhflalllllllafafhalhflahfahhf'a</p>
      <a href="#" onclick="toggle()">Close</a>

    </div>
    <script>
      function toggle(){
        var blur = document.getElementById('blur');
        blur.classList.toggle('active');
        var pop = document.getElementById('pop');
        pop.classList.toggle('active');
        
      }

    </script>
    
        
      
    
  </form>
  <!-- Link to Bootstrap JS and jQuery -->
  
  
</body>
</html>