<?php
    include '../db/dbhinc.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styleRegister.css">
    <title>Register</title>
</head>
<body>
    <section>
    <div class="form-box">
    <div class="form-value">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h2>Register</h2>
            <div class='inputbox'>
                <ion-icon name="person-outline"></ion-icon>
                <input type="text" name="username" id="firstname" required>
                <label for="username">Username</label>
            </div>
            <div class='inputbox'>
                <ion-icon name="person-outline"></ion-icon>
                <input type="text" name="phone_number" id="lastname" required>
                <label for="phone_number">Phone Number</label>
            </div>
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
                <label for="user-type">Select user type:</label><br><br>
                <select id="role" name="role">
                    <option value="artisan">Artisan</option>
                    <option value="client">Client</option>
                </select>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["psd"];
        $phone_number = $_POST["phone_number"];
        $role = $_POST["role"];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Check if the username or email already exists in the database
        $result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' OR email='$email'");
        
        if (mysqli_num_rows($result) > 0) {
            // Username or email already exists in the database, display error message
            echo "Username or email already exists, please try again with different credentials.";
        } else {
            $sql = "INSERT INTO users (username, email, password, phone_number, role) VALUES ('$username', '$email', '$hashed_password', '$phone_number', '$role')";
            if (mysqli_query($mysqli, $sql)) {
               if ($role == 'artisan'){
                    session_start();
                    $_SESSION["USER_EMAIL"] = $email;
                    $_SESSION["USER_ID"] = $userId;
                $_SESSION["USER_NAME"] = $username;                            
                header("location: artisan_login.php");
                exit;
                }
                else if($role == 'client'){
                    session_start();
                    $_SESSION["USER_EMAIL"] = $email;
                    $_SESSION["USER_ID"] = $userId;
                $_SESSION["USER_NAME"] = $username;                            
                header("location: ../index.php");
                exit;
                }
                
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            }
        }
    }
?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>