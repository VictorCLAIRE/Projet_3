
<?php
//Ici $title de template.php dans la balise <title><?= $title ></title>
$title = "Ecommerce - EnregistrementProduit -";
//ob_start() démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, 
//hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
ob_start();
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

<h1 class="d-flex justify-content-center">Enregistrement de votre nouveau produit</h1>
<?php


$nom_produit =htmlspecialchars( $_POST['Nom_produit']);
$image_produit =htmlspecialchars( $_POST['Image_produit']);
$description_produit =htmlspecialchars( $_POST['Description_produit']);
$prix_produit =htmlspecialchars( $_POST['Prix_produit']); 


$sql ="INSERT INTO produits (nom_produit, image_produit, description_produit, prix_produit) VALUE (?,?,?,?)";
$requete_insertion = $db->prepare($sql);
$requete_insertion->bindParam(1, $nom_produit);
$requete_insertion->bindParam(2, $image_produit);
$requete_insertion->bindParam(3, $description_produit);
$requete_insertion->bindParam(4, $prix_produit);

$requete_insertion->execute(array($nom_produit, $description_produit, $image_produit, $prix_produit));

if($requete_insertion){
    echo "<p class='alert-success'>Votre produit à bien été ajouté !</p>";
    ?>
    <ul>
        <li><?php echo "Ajout du nouveau produit :" . $nom_produit;?></li>
        <li><?php echo "Photo associé au produit :" . $image_produit;?></li>
        <li><?php echo "Description de votre nouveau produit :" .$description_produit;?></li>
        <li><?php echo "Prix de votre nouveau produit :" . $prix_produit;?></li>
    </ul>
    <?php

}else{
    echo "<p class='alert-danger'>Erreur: Merci de remplir tous les champs</p>";
}

?>
    <div class="btnAjoutProduit"> 
        <a href="Ajout_produit.php" class="btn btn-danger">Ajouter un autre produit</a>
    </div>
    <div class="btnBack"> 
        <a href="general.php" class="btn btn-primary">Retour Accueil</a>
    </div>    
<?php
//$content de template.php definis ce qui ce trouve dans le body
//Retourne le contenu du tampon de sortie et termine la session de temporisation. 
//Si la temporisation n'est pas activée, alors false sera retourné.
$content = ob_get_clean();
//Rappel du template sur chaque page
require "template.php";
?>