<style>
    .ligne_produit_details{
  margin: 2px;
  background-color: rgb(207, 204, 204);
  overflow : hidden;
  text-align: center;
}
.modification{
  background-color:rgb(207, 204, 204);
}
</style>
<?php
//Ici $title de template.php dans la balise <title><?= $title ></title>
$title = "Ecommerce - SuppressionProduit -";
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

<h1 class="d-flex justify-content-center">Modification du produit validée</h1>
<!--Récupération de l'ID dans l'URL et lecture du produit by ID-->
<?php
$ID = htmlspecialchars($_GET['ID']);
$update = htmlspecialchars($_POST['Nom_produit_modifie']);
$req= $db->prepare("UPDATE `produits` SET `nom_produit`= '$update' WHERE `id_produit` = ?");
$req->execute(array($ID));
?>

    <!--RESULTAT AFFICHE-->
    <div class="container modification">
        <p>VOTRE MODIFICATION:</p>
        <p><?php echo $update?></p>
    </div>

    <div class="btnBack"> 
        <a href="general.php" class="btn btn-primary">Retour Accueil</a>
    </div>    
<?php
$req2 = $db->prepare('SELECT * FROM produits WHERE id_produit = ?');
$req2->execute(array($ID));
$res2 = $req2->fetch(PDO::FETCH_ASSOC);

?>
    <div class="container">
        <div class="row categorie">
            <div class="col-3 container">
                <p>NOM DU PRODUIT</p>
            </div>
            <div class="col-3 container">
                <p>PHOTO</p>
            </div>
            <div class="col-3 container">
                <p>DESCRIPTION DU PRODUIT</p>
            </div>
            <div class="col-3 container">
                <p>PRIX DU PRODUIT</p>
            </div>
        </div>
    </div>
    <div class="container ligne_produit_details">
        <div class="row">
            <div class="col-3 container">
                <?php echo $res2['nom_produit'] ?>
            </div>
            <div class="col-3 container">
                <img class="img" src="<?= $res2['image_produit'] ?>" alt="<?= $res2['nom_produit'] ?>"/>
            </div>
            <div class="col-3 container">
                <?php echo $res2['description_produit'] ?>
            </div>
            <div class="col-3 container">
                <?php echo $res2['prix_produit'] ?> €
            </div>
        </div>
    </div>

<?php
//$content de template.php definis ce qui ce trouve dans le body
//Retourne le contenu du tampon de sortie et termine la session de temporisation. 
//Si la temporisation n'est pas activée, alors false sera retourné.
$content = ob_get_clean();
//Rappel du template sur chaque page
require "template.php";
?>