<?php
    include_once '../db/dbhinc.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/styleRegister.css">
    <title>Register</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <h2 >Register</h2>
                    <div class="inputbox">
                        <ion-icon name="id-card-outline"></ion-icon>
                        <input type="email" name="email"  id="email" required>
                        <label for="id">Email</label>
                    </div>
                    
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="psd" id="psd" required>
                        <label for="psw">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="psd-repeat" id="psw-repeat" required>
                        <label for="psw-repeat">Repeat Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="username" id="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="phone" id="phone" required>
                        <label for="phone">Phone Number</label>
                    </div>
                    <div>
                        <!-- /check if it is artisan or a normal user -->
                        <input type="radio" id="artisan" name="user" value="artisan">
                        <label for="artisan">Artisan</label>
                        <input type="radio" id="user" name="user" value="user" checked>
                        <label for="user">User</label>
                    </div>
                    <span id = "error"></span>
                    <button type="submit" >Register</button>
                </form>
            </div>
        </div>
    </section>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["psd"];
            $type = $_POST['user'];
            $phone = $_POST["phone"];
            $error1 = '10';
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // Check if the username or email already exists in the database             
            $stmt = $conn->prepare("SELECT * FROM users WHERE name ='$username' OR email='$email'");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $rownum = $stmt->rowCount();
            if ($rownum > 0) {
                // Username or email already exists in the database, display error message
                echo '<script>document.getElementById("error").innerHTML += "Username or email already exists.";</script>';
                
            } else {
                if ($type = "user"){

                    $sql = "INSERT INTO users (name, email, password, phone) VALUES ('$username', '$email', '$hashed_password', '$phone')";
                }
                else{
                    $sql = "INSERT INTO artisans (name, email, password, phone) VALUES ('$username', '$email', '$hashed_password', '$phone')";
                }
                $stmt = $conn->prepare($sql);

                if ($stmt !== false) {
                    header("Location: login.php");
                    exit;
                } else {
                    $errorInfo = $stmt->errorInfo();
                    echo "Error: " . $sql . "<br>" . $errorInfo[2];
                }
            }

        }
        ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>