<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/knacss.min.css">
    <link rel="stylesheet" href="css/indexSansGrid.css">
    <link rel="stylesheet" href="css/moviemanager.css" />
    <title>Movie manager</title>
</head>
<body>
<section>
    <div>
        <h1>Gestion des affiches de films</h1>
    </div>
</section>
<section id="listfilm">
    <table>
        <thead>
        <tr>
            <th colspan="2">Films à l'affiche</th>
        </tr>
        </thead>
        <tbody>
    <?php
    try
    {
// On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=parnal;charset=utf8', 'root', '5MichelAnnecy', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
        <tr>
            <td><?php echo $donnees['titre']?></td>
            <td><a href="deletemovie.php?id=<?php echo $donnees['id']?>">Supprimer</a></td>
        </tr>
        <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
        </tbody>
    </table>
</section>
<section id="form">
    <h3>Ajouter un film</h3>
    <form action="/addmovie.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="titre">Titre du film :</label>
            <input type="text" id="titre" name="titre" required>
        </div>
        <div>
            <label for="affiche">Affiche du film: </label>
            <input type="file" id="affiche" name="affiche" required>
        </div>
        <div>
            <label for="pays">Pays:</label>
            <input type="text" id="pays" name="pays" required>
        </div>
        <div>
            <label for="duree">Durée:</label>
            <input type="time" id="duree" name="duree" required>
        </div>
        <div>
            <label for="real">Réalisateur:</label>
            <input type="text" id="real" name="real" required>
        </div>
        <div>
            <label for="interpretes">Interprètes:</label>
            <input type="text" id="interpretes" name="interpretes" required>
        </div>
        <div>
            <label for="synopsis">Synopsis :</label>
            <textarea id="synopsis" name="synopsis" required></textarea>
        </div>
        <div>
            <input type="submit" name="valid" value="Ajouter le film" id="valid">
        </div>
    </form>
</section>
</body>
</html>