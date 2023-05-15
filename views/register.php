<?php
    include_once '../db/dbhinc.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>To Do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styleRegister.css">
    <title>Log in</title>
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

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // Check if the username or email already exists in the database             
            $result = mysqli_query($conn, "SELECT * FROM User WHERE username='$username' OR email='$email'");

            if (mysqli_num_rows($result) > 0) {
                // Username or email already exists in the database, display error message
                echo "Username or email already exists, please try again with different credentials.";
            } else {
                $sql = "INSERT INTO User (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
                if (mysqli_query($conn, $sql)) {
                    header("Location: login.php");
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }

        }
        ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>