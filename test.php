<?php
include_once 'db/dbhinc.php';

$result = mysqli_query($conn,'SELECT * FROM services');

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $recherche = htmlspecialchars($_GET['search']);
    $query = 'SELECT * FROM services WHERE service_name LIKE "%' . $recherche . '%"';
    $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher des utilisateurs</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="login-form">
        <form action="" method="$_GET">
            <div class="form-group">
                <input type="search" name="search" placeholder="Rechercher un utilisateurs">
            </div>
            <div class="form-group">
                <input type="submit" name="envoyer" class="btn btn-primary ">
            </div>
        </form>

    </div>
    <section class="affichage_utilisateur">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($users = mysqli_fetch_assoc($result)) {
        ?>
                <p><?= $users['service_name']; ?></p>
        <?php
            }
        } else {
            echo "<p>aucun utilisateur trouver</p>";
        }

        ?>
    </section>

</body>

</html>