<?php
//ajout de fichier affiche
$target_dir = "img/films/";
$target_file = $target_dir . basename($_FILES["affiche"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["valid"])) {
    $message = 'Error uploading file';
    switch( $_FILES['affiche']['error'] ) {
        case UPLOAD_ERR_OK:
            $message = false;;
            break;
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            $message .= ' - file too large (limit of 12M bytes).';
            break;
        case UPLOAD_ERR_PARTIAL:
            $message .= ' - file upload was not completed.';
            break;
        case UPLOAD_ERR_NO_FILE:
            $message .= ' - zero-length file uploaded.';
            break;
        default:
            $message .= ' - internal error #'.$_FILES['affiche']['error'];
            break;
    }
    if (!$message)
    {
        $check = mime_content_type($_FILES["affiche"]["tmp_name"]);
        if(str_contains($check, 'image') == true) {
            echo "File is an image - " . $check . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    else
    {
        echo $message;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["affiche"]["size"] > 8000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["affiche"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["affiche"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//Ajout du film en bdd
if (isset($_POST['titre']))
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
    $req = $bdd->prepare('INSERT INTO film (titre,affiche,pays,duree,realisateur,interpretes,synopsis) VALUES 
        (\''.addslashes($_POST['titre']).'\',\''.$_FILES["affiche"]["name"].'\',\''.addslashes($_POST['pays']).'\',\''.addslashes($_POST['duree']).'\',\''.addslashes($_POST['real']).
        '\',\''.addslashes($_POST['interpretes']).'\',\''.addslashes($_POST['synopsis']).'\')');
    $nbdelete = $req->execute();

    header('Location: /moviemanager.php');
    exit;
}
?>
<a href="moviemanager.php">Retour à la gestion des films</a>
