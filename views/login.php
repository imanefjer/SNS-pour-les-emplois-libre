<?php
    include_once '../db/dbhinc.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="..\style\style.css">
    <title>Log in</title>
</head>
<body>
    <?php 
        $email = "";
        $emailError = $psdError = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $conn->quote($_POST['email']);
            $psd = $conn->quote($_POST['psd']);
            if (empty($email)) {
                $emailError = "Veuillez entrer votre email";
            }
            $type = $_POST['user'];
            if ($type == "user"){
                $stmt = $conn->prepare("SELECT password FROM users WHERE Email=$email ");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);



                // $result = mysqli_query($conn, "SELECT password FROM User WHERE Email='$email' ");
            }
            else{
                $stmt = $conn->prepare("SELECT password FROM artisans WHERE Email=$email ");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                
            }
    
            if ($row > 0 ) {
                $user_row = $stmt->fetch(PDO::FETCH_ASSOC);
                $hashed_password = $user_row;               
                if (password_verify($psd, $hashed_password)) {
                    session_start();
                    $_SESSION["USER_ID"] = $userId;
                    $_SESSION["USER_NAME"] = $username;                            
                    header("location: index1.php");
                } else {
                    $error = "Invalid password.";

                }
                exit();
            } 
            else{
                $error = "Invalid email or password.";
            }
        }
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
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="psd" id="psw" required>
                        <label for="psw">mot de passe</label>
                    </div>
                    <div>
                        <!-- /check if it is artisan or a normal user -->
                        <input type="radio" id="artisan" name="user" value="artisan">
                        <label for="artisan">Artisan</label>
                        <input type="radio" id="user" name="user" value="user" checked>
                        <label for="user">User</label>
                    </div>
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
</body>
</html>