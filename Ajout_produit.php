
<?php
//Ici $title de template.php dans la balise <title><?= $title ></title>
$title = "Ecommerce - AjoutProduit -";
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

<h1 class="d-flex justify-content-center">Ajout d'un produit</h1>
        <!--Forumlaire pour modification de tel ou tel attribut, colonne, du produit sélectionné par l'ID-->
<form action="EnregistrementProduit.php" method="post">

    <div class="form-group">
        <label for="Nom_produit">Nom du produit</label>
        <input class="form-control" required type="text" id="Nom_produit" name="Nom_produit"  >
    </div>
    <div class="form-group">
        <label for="Image_produit">Image du produit</label>
        <input class="form-control" required type="text" id="Image_produit" name="Image_produit">
    </div>
    
    <div class="form-group"> 
        <label for="Description_produit">Description du produit</label>
        <textarea class="form-control" required name="Description_produit" id="Description_produit" cols="15" rows="5"></textarea>
    </div>
 
    <div class="form-group">
        <label for="Prix_produit">Prix du produit</label>
        <input class="form-control" required type="number" min="1" max="10000000000" id="Prix_produit" name="Prix_produit">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Ajouter le produit</button>
    </div>
  
</form>

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