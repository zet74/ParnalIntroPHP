<?php
if (isset($_GET['id']))
{
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
    $req = $bdd->prepare('DELETE FROM film WHERE id='.$_GET['id']);
    $nbdelete = $req->execute();

    header('Location: /moviemanager.php');
    exit;
}
