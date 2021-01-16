<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Premier site</title>
    <link rel="stylesheet" href="css/knacss.min.css">
    <link rel="stylesheet" href="css/indexSansGrid.css">

</head>
<body>
<header>
    <img src="img/logoCouleur.jpg" />
    <div>
        <p class="textHeader" id="deb">Pour être enchanté......</p>
        <p class="textHeader" id="fin">....rien ne vaut une séance de ciné</p>
    </div>
    <nav>
        <ul>
<?php
try
{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=parnal;charset=utf8', 'root', '5MichelAnnecy');
}
catch(Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
die('Erreur : '.$e->getMessage());
}
// On récupère tout le contenu de la table film
$reponse = $bdd->query('SELECT id,titre FROM film');
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
            <li><a id="bp1" href="#film<?php echo $donnees['id']?>"><?php echo $donnees['titre']?></a></li>
<?php
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>
        </ul>
    </nav>
</header>
<?php
// On récupère tout le contenu de la table film
$reponse = $bdd->query('SELECT * FROM film');
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
<article class="tab" id="film<?php echo $donnees['id']?>">
    <img src="img/films/<?php echo $donnees['affiche']?>" />
    <div>
        <h1><?php echo $donnees['titre']?></h1>
        <h2><?php echo $donnees['pays']?>, Durée:<?php echo $donnees['duree']?></h2>
        <h3>Réalisateur : <?php echo $donnees['realisateur']?></h3>
        <h4>Interprètes : <?php echo $donnees['interpretes']?></h4>
        <p>Synopsis : <?php echo $donnees['synopsis']?></p>
    </div>
</article>
<?php
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>

<footer>
    <p>Cinéma le parnal, 260 rue St François de Sales 74570 Fillière</p>
</footer>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/getmovie.js"></script>
</body>
</html>