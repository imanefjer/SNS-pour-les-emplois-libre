<?php
    include '../db/dbhinc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Artisan Details</title>
</head>
<body>
<section>
        <div class="form-box">
            <div class="form-value">
                <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <h2 >Login</h2>
                    <div class="inputbox">
                        <input type="text" name="company_name"  id="company_name" required>
                        <label for="company_name">Company Name</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="company_ad"  id="company_ad" required>
                        <label for="company_id">Company Adress</label>
                    </div>
                    <div class="inputbox">
                        <input type="desc" name="desc" id="desc" required>
                        <label for="desc">Description</label>
                    </div>
                    <div class="inputbox">
                        <br>
                        <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
                        <label for="profile_picture">Profile Picture</label>
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
    <?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo 'rzef';
    // Existing code for processing form fields
    $company_name = $_POST["company_name"];
    $company_ad = $_POST["company_ad"];
    $desc = $_POST["desc"];
    $destination = "sfff";
    echo 'zggvfrf';

    // Check if a profile picture file was uploaded
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] === UPLOAD_ERR_OK) {
        $tempFilePath = $_FILES["profile_picture"]["tmp_name"];
        $fileName = $_FILES["profile_picture"]["name"];
        $fileSize = $_FILES["profile_picture"]["size"];
        $fileType = $_FILES["profile_picture"]["type"];
        echo $destination;

        // Move the uploaded file to a desired location
        $destination = "../images/" . $fileName;

        if (move_uploaded_file($tempFilePath, $destination)) {
            $query = "SELECT user_id FROM users WHERE email = '" . $_SESSION['USER_EMAIL'] . "'";
            echo $destination;

            // Execute the query to retrieve user_id
            $result = mysqli_query($mysqli, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['user_id'];

                $sql = "INSERT INTO artisans (user_id, company_name, company_address, description, profile_picture) VALUES ('$user_id', '$company_name', '$company_ad', '$desc', '$destination')";
                if (mysqli_query($mysqli, $sql)) {
                    header("Location: user_dashboard.php");
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            } else {
                echo "User not found.";
            }
        } else {
            // Error handling for file upload failure
            echo "Failed to upload the profile picture.";
        }
    }
}
?>

</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>
