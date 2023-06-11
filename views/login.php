<?php
    include '../db/dbhinc.php';
    session_start();

    if (isset($_SESSION['USER_NAME'])) {
        header("Location: ../index.php");
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Log in</title>
</head>
<body>
    <?php 
        $email = "";
        $emailError = $psdError = "";
        $error = "";
        $submit = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $psd = mysqli_real_escape_string($conn, $_POST['psd']);
            if (empty($email)) {
                $emailError = "Veuillez entrer votre email";
            }
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' ");
            if ($result === false) {
                die('Query error: ' . mysqli_error($conn));
            }
            
            if (mysqli_num_rows($result) > 0) {
                $user_row = mysqli_fetch_assoc($result);
                $hashed_password = $user_row['password'];   
                if (password_verify($psd, $hashed_password)) {
                   
                    $_SESSION["USER_ID"] = $user_row["user_id"];
                    $_SESSION["USER_NAME"] = $user_row["username"];   
                    $_SESSION["ROLE"] = " ";                         
                    header("location: user_dashboard.php");
                    
                } else {
                    $psdError = "Invalid password.";
                    $submit = false;

                }
                exit();
            } 
            else{
                $emailError = "Invalid email or password.";
                $submit = false;

            }
        }
        else {
            $submit = false;
        }
        if($submit == false) {
    
         ?>
          <section>
        <div class="form-box">
            <div class="form-value">
                <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <h2 >Login</h2>
                    <div class="inputbox">
                        <ion-icon name="id-card-outline"></ion-icon>
                        <input type="email" name="email"  id="email" required>
                        <label for="id">Email</label>
                    </div>
                    <span class="error"><?php echo $emailError; ?></span>


                    
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="psd" id="psw" required>
                        <label for="psw">mot de passe</label>
                    </div>
                    <span class="error"><?php echo $psdError; ?></span>
                    <?php if(isset($error)) { ?>
                            <span><?php echo $error; ?></span>
                    <?php } ?>
                    <button type="submit" >Log in</button>
                </form>
                <div class ="register">
                    <p>Don’t have an account yet? <br><a href="register.php">Sign up </a>.</p>
                </div>
            </div>

        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <?php } else { 
                header("Location: ../user_dashboard.php");
               
        }?>
</body>
</html>