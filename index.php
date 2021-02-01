<style>
/************TITRE**********/
h1{
  text-align: center;
  font-size: 30px;
}
/***************LOGIN**********/
#login-form{
  text-align: center;
  border: solid black 3px;
  border-radius: 4px;
  background-color: lime;
  margin: 2px;
  width: 500px;
}
html{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
</style>
<?php
session_start();
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

<!--Programe de lecture de login et mdp pour connexion:-->

<?php

foreach($db->query("SELECT * FROM `user`ORDER BY `id_user`")
as $row){
?>
<div class="container"> 
    <div class="row">
        <div class="col-6 container">
            <?php echo $row['email_user'] ?>
        </div>
         <div class="col-6 container">
            <?php echo $row['password_user'] ?>
        </div>
    </div>
</div>
<?php
}

$email_valide = $row['email_user'];
$mot_de_passe_valide = $row['password_user'];
$_POST['name']=$row['name_user'];

echo  $email_valide;
echo $mot_de_passe_valide;
echo $_POST['name'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Veuillez vous connecter</h1>
    <div class="text-center" id="login-form">
        <form action="connexion.php" method="POST">
            <div class="form-group"> 
                <label for="email">Votre email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group"> 
                <label for="password">Votre mot de passe:</label>
                <input type="password" id="password" name="password">
            </div>
            <button class="btn btn-info" type="submit"> CONNEXION </button>
        </form>
        <a href="inscription.php">Inscription</a>
    </div>

</body>

</html>