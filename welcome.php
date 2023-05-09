<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
   

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
include 'connectData.php';
?>
<div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form method="POST" action="" class="register-form" id="login-form" >
                            
                            <div class="form-group">
                                <label for="you"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_no" id="you" placeholder="What are you (user or craftsman)?"/>
                                <small style="color:red"></small>
                            </div>
                            
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_no" id="your_no" placeholder="Your ID"/>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="button" name="submit" id="submit" class="form-submit" value="submit" />
                            </div>
                            
                            
                            
                        </form>
                        
                        
                    </div>
                </div>
            </div>
            
                

</body>
</html>