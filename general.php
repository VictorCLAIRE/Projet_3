<?php
//Ici $title de template.php dans la balise <title><?= $title ></title>
$title = "Ecommerce - NOS PRODUITS -";
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

<h1 class="d-flex justify-content-center">Bienvenue sur le E-commerce</h1>
<div class="btnAjoutProduit">
    <a class="btn btn-info" href="Ajout_produit.php">Ajouter un produit</a>
</div>    
<?php
$sql = "SELECT * FROM produits";
$req = $db->query($sql);
?>
<div class="container">
    <div class="row categorie">
        <div class="col-1 container">
            <p>NOM DU PRODUIT</p>
        </div>
        <div class="col-3 container">
            <p>PHOTO</p>
        </div>
        <div class="col-3 container">
            <p>DESCRIPTION DU PRODUIT</p>
        </div>
        <div class="col-1 container">
            <p>PRIX DU PRODUIT</p>
        </div>
        <div class="col-1 container">
            <p>EN SAVOIR PLUS</p>
        </div>
        <div class="col-1 container">
            <p>MODIFIER</p>
        </div>
        <div class="col-2 container">
            <p>SUPRESSION DU PRODUIT</p>
        </div>
    </div>
</div>

<?php
foreach($db->query("SELECT * FROM `produits`ORDER BY `id_produit` DESC")
    as $row){
?>
    <div class="container ligne_produit"> 
        <div class="row">
            <div class="col-1 container">
                <?php echo $row['nom_produit'] ?>
            </div>
            <div class="col-3 container">
                <img class="img" src="<?= $row['image_produit'] ?>" alt="<?= $row['nom_produit'] ?>"/>
            </div>
            <div class="col-3 container">
                <?php echo $row['description_produit'] ?>
            </div>
            <div class="col-1 container">
                <?php echo $row['prix_produit'] ?> €
            </div>
            
            <div class="col-1 container">
                <a class="btn btn-info" href="Details.php?ID=<?=$row["id_produit"]?>">Détails</a>
            </div>
            <div class="col-1 container">
            <a class="btn btn-success" href="Modification.php?ID=<?=$row["id_produit"]?>">Modifier</a>
            </div>
            <div class="col-2 container">
            <a class="btn btn-warning" href="SuppressionProduit.php?ID=<?=$row["id_produit"]?>">Supprimer</a>
            </div>
        </div>
    </div>
<?php
}
?>

<?php
//$content de template.php definis ce qui ce trouve dans le body
//Retourne le contenu du tampon de sortie et termine la session de temporisation. 
//Si la temporisation n'est pas activée, alors false sera retourné.
$content = ob_get_clean();
//Rappel du template sur chaque page
require "template.php";
?>