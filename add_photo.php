<?php
// Connexion à la base de données
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assurez-vous que l'utilisateur est connecté
    if (!isset($_SESSION['email']) || !isset($_SESSION['id'])) {
        die("Utilisateur non connecté.");
    }

    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
    $profile_picture = 'default.jpg';

    // Vérifier si le formulaire a été soumis avec un fichier
    if (isset($_FILES["profilePicture"]) && $_FILES["profilePicture"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifier si le fichier est une image réelle
        $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Vérifier la taille du fichier
        if ($_FILES["profilePicture"]["size"] > 5000000) { // Limite à 5 Mo
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Autoriser certains formats de fichier
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Vérifier si $uploadOk est défini à 0 par une erreur
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Si tout est correct, essayer de télécharger le fichier
            if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " has been uploaded.";

                // Sauvegarder le chemin du fichier dans la base de données
                $sql = "UPDATE clients SET profile_picture='$target_file' WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "Profile picture updated successfully.";
                    header("Location: profile.php");
                } else {
                    echo "Error updating profile picture: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}


$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="profil.css"/>
    <meta charset="utf-8"/>
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body> 
   <form  method="post" enctype="multipart/form-data">
        <label for="profilePicture">Upload Profile Picture:</label>
        <input type="file" name="profilePicture" id="profilePicture">
        <input type="submit" name="submit" value="Upload">
    </form>
</body> 
</html>
    
