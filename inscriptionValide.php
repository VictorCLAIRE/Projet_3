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
$nameInscription  =htmlspecialchars( $_POST['name']);
$emailInscription  =htmlspecialchars( $_POST['email']);
$passwordInscription =htmlspecialchars( $_POST['password']);

$sql ="INSERT INTO user (name_user, email_user, password_user) VALUE (?,?,?)";
$requete_insertion = $db->prepare($sql);
$requete_insertion->bindParam(1, $nameInscription);
$requete_insertion->bindParam(2, $emailInscription);
$requete_insertion->bindParam(3, $passwordInscription);

$requete_insertion->execute(array($nameInscription, $emailInscription, $passwordInscription));

if($requete_insertion){
    echo "<p class='alert-success'>Votre inscription est validée !</p>";
    ?>
    <ul>
        <li><?php echo "Nom :" . $nameInscription;?></li>
        <li><?php echo "Email :" . $emailInscription;?></li>
        <li><?php echo "MDP :" . $passwordInscription;?></li>
    </ul>
<?php
}else{
    echo "<p class='alert-danger'>Erreur: Merci de remplir tous les champs</p>";
}
?>
    <div class="btnAjoutProduit"> 
        <a href="index.php" class="btn btn-danger">Se loger</a>
    </div>    
<?php
//$content de template.php definis ce qui ce trouve dans le body
//Retourne le contenu du tampon de sortie et termine la session de temporisation. 
//Si la temporisation n'est pas activée, alors false sera retourné.
$content = ob_get_clean();
//Rappel du template sur chaque page
require "template.php";
?>