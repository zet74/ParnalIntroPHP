<!DOCTYPE html>
<html>
<head>
    <title>Ceci est une page de test avec des balises PHP</title>
    <meta charset="utf-8" />
</head>
<body>
<h2>Page de test</h2>

<p>
    Cette page contient du code HTML avec des balises PHP.<br />
    <?php /* Insérer du code PHP ici */ ?>
    Voici quelques petits tests :
</p>

<ul>
    <li style="color: blue;">Texte en bleu</li>
    <li style="color: red;">Texte en rouge</li>
    <li style="color: green;">Texte en vert</li>
</ul>

<?php
$nom_du_visiteur = "rnadal";

//Type int: entier
$age_du_visiteur = 17;

//Type float: nombre rationnel
$poids = 57.3;

//Type bool: booléen (vrai ou faux)
$je_suis_bon_en_php = false;

//sans type, NULL
$pas_de_valeur = NULL;

//affichage du contenu d'une variable
echo $age_du_visiteur;
//affichage avec concaténation
echo 'Le visiteur a ' . $age_du_visiteur . ' ans';

//on peut faire des calculs
$nombre = 2 + 4; // $nombre prend la valeur 6
$nombre = 5 - 1; // $nombre prend la valeur 4
$nombre = 3 * 5; // $nombre prend la valeur 15
$nombre = 10 / 2; // $nombre prend la valeur 5
$nombre = 3 * 5 + 1; // $nombre prend la valeur 16
$nombre = (1 + 2) * 2; // $nombre prend la valeur 6
//et des calculs avec des variables
$resultat = ($nombre + 5) * $nombre; // $resultat prend la valeur 150

?>
</body>
</html>



