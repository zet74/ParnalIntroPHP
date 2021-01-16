<?php
//Type string: chaine de caratères
$nom_du_visiteur = "rnadal";

//Type int: entier
$age_du_visiteur = 17;

//Type float: nombre rationnel
$poids = 57.3;

//Type bool: booléen (vrai ou faux)
$je_suis_bon_en_php = false;

//sans type, NULL
$pas_de_valeur = NULL;

if (une comparaison sur une ou plusieurs variable)
{
    //instruction à exécuter SI la condition du if est remplie
}
elseif (une comparaison sur une ou plusieurs variable)
{
    //SINON, instruction à exécuter SI la condition du elseif est remplie
}
else
{
    //SINON, instruction à exécuter (en dernier recours après un if (et elseif)
}

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



if ($age <= 12) // SI l'âge est inférieur ou égal à 12
{
    echo "Salut gamin ! Bienvenue sur mon site !<br />";
    $autorisation_entrer = "Oui";
} else // SINON
{
    echo "Ceci est un site pour enfants, vous êtes trop vieux pour pouvoir  entrer. Au revoir !<br />";
    $autorisation_entrer = "Non";
}
echo "Avez-vous l'autorisation d'entrer ? La réponse est : $autorisation_entrer";

$age = 8;
$langue = "français";
if ($age <= 12 AND $langue == "français")
{
    echo "Bienvenue sur mon site !";
}
elseif ($age <= 12 AND $langue == "anglais")
{
    echo "Welcome to my website!";
}


$note = 10;

switch ($note) // on indique sur quelle variable on travaille
{
    case 0: // dans le cas où $note vaut 0
        echo "Que s'est-il passé?!!!";
        break;

    case 5: // dans le cas où $note vaut 5
        echo "Peut vraiment beaucoup mieux faire en apprenant";
        break;

    case 7: // dans le cas où $note vaut 7
        echo "Peut mieux faire...";
        break;

    case 10: // etc. etc.
        echo "Tu as pile poil la moyenne, c'est un peu juste…";
        break;

    case 12:
        echo "Tu es assez bon";
        break;

    case 16:
        echo "Tu te débrouilles très bien !";
        break;

    case 20:
        echo "Excellent travail, c'est parfait !";
        break;

    default:
        echo "Désolé, je n'ai pas de message à afficher pour cette note";
}


try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'motdepassederoot');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM ma_table');
$donnees = $reponse->fetch();
while ($donnees = $reponse->fetch())
{
    echo 'Ma colonne 1 contient:' . $donnees['nom_colonne1'] .
        ' Ma colonne 2 contient:'. $donnees['nom_colonne2'] . 'etc...<br />';
}

$reponse->closeCursor();


$nombre_de_lignes = 1;

while ($nombre_de_lignes <= 100) {
    echo 'Je ne dois pas regarder les mouches voler quand j\'apprends le PHP.<br />';
    $nombre_de_lignes++; // $nombre_de_lignes = $nombre_de_lignes + 1
}

for ($nombre_de_lignes = 1; $nombre_de_lignes <= 100; $nombre_de_lignes++) {
    echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';
}
//test avec l'opérateur ==
if ($variable_a_tester == true)
//on a le droit de ne pas mettre == true
if ($variable_a_tester) //dans ce cas, c'est implicite qu'on teste si cette variable est à TRUE
//pour false, avec l'opérateur ==
if ($variable_a_tester == false)
//et on peut remplacer le == false par un ! devant la variable à tester
if (!$variable_a_tester) //dans ce cas, on teste si cette variable est à FASLE

//la variable $prenom est un tableau numéroté
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');
//on peut aussi le déclarer et le remplir comme ça:
$prenoms[0] = 'François';
$prenoms[1] = 'Michel';
$prenoms[2] = 'Nicole';
//ou alors comme ça:
$prenoms[] = 'François'; // Créera $prenoms[0]
$prenoms[] = 'Michel'; // Créera $prenoms[1]
$prenoms[] = 'Nicole'; // Créera $prenoms[2]

//et pour afficher la ligne 2 de mon tableau, on fera:
echo $prenoms[1];

// On crée notre array $coordonnees
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');
//on peut aussi le créer comme cela:
$coordonnees['prenom'] = 'François';
$coordonnees['nom'] = 'Dupont';
$coordonnees['adresse'] = '3 Rue du Paradis';
$coordonnees['ville'] = 'Marseille';

//et pour afficher par exemple la clé 'ville', il suffit de faire:
echo $coordonnees['ville'];

// On crée notre array $prenoms
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');

// Exemple boucle for pour tout afficher:
for ($numero = 0; $numero < 5; $numero++)
{
    echo $prenoms[$numero] . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}

//Exemple boucle foreach pour tout afficher:
foreach($prenoms as $element)
{
    echo $element . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}
//foreach va passer en revue chaque ligne du tableau
//et met cette ligne dans la variable passée, ici $element


$coordonnees = array(
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

foreach ($coordonnees as $element) {
    echo $element . '<br />';
}
//on affichera ici:
//François
//Dupont
//3 Rue duParadis
//Marseille

foreach($coordonnees as $cle => $element)
{
    echo '[' . $cle . '] vaut ' . $element . '<br />';
}
//ici, on affichera la clé et la valeur correspondante
//[prenom] vaut François
//[nom] vaut Dupont
//....
?>

<input type="text" id="titre" name="titre" required>

<?php
$_GET['name']
$_POST['titre']