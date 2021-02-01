<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <div class="topnav" id="myTopnav">
            <a class="nav btnleft" href="general.php">Accueil</a>
            <a class="nav btnleft" href="Aide_Contact.php">Aide et contact</a>
            <a class="nav btnright" href="Deconnexion.php">Déconnexion</a>
            <a class="nav btnright" href="#"><?php echo $_SESSION['email'] ?></a>
            <a class="nav btnright" href="#"><?php echo $_SESSION['name'] ?></a>


        </div>
    </header>

    <div class="container">
        <?= $content ?>
    </div>
</body>
</html>