<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<?php
    //COONEXION A LE BASE de DONNÉES
    //Stock des valeur nom utilistateur phpmyadmin et mot de passe
    $user = "root";
    $pass = "";
    //Essaie de te connecter
    try{
        //Stockage et instance de la classe PDO pour connecter php et mysql
        $db = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", "root");
        //Fonction static de la classe PDO pour debug la connexion en cas d'erreur
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){
    die("Erreur de connexion a PDO MySQL :" .$exception->getMessage());
}
?>
<body>
    <h1 class="d-flex justify-content-center">Veuillez vous incrire pour accéder au site</h1>
            <!--Forumlaire pour modification de tel ou tel attribut, colonne, du produit sélectionné par l'ID-->
    <div class="container">
        <form action="inscriptionValide.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" required type="text" id="name" name="name"  >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" required type="text" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input class="form-control" type="text" id="password" name="password">
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block">Inscription</button>
            </div>
        </form>
            <div class="btnBack"> 
                <a href="index.php" class="btn btn-primary">Je suis déja incrit</a>
            </div>              
    </div>
    
</body>
