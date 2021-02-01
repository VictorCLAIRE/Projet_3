<?php
//Ici $title de template.php dans la balise <title><?= $title ></title>
$title = "Ecommerce - NOS PRODUITS -";
//ob_start() démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, 
//hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
ob_start();
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
    <div class="container ligne_produit"> 
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

if(isset($_POST['email']) && isset($_POST['password'])){
    if($email_valide == $_POST['email'] && $mot_de_passe_valide == $_POST['password']){
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['name'] = $_POST['name'];

        header('Location: http://localhost/Projet_3/general.php');
    }else{
        echo "ERROR";
        header('Location: http://localhost/Projet_3/inscription.php');

    }    
}else{
    echo "EROOR";
    header('Location: http://localhost/Projet_3/inscription.php');
}



