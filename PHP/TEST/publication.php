<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: inscription.php");
    exit();
}
if(isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $article = $_POST['article'];
    
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "school_troc");

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Préparer la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO article (username, article) VALUES (?, ?)");
    $stmt->bind_param("ss", $_SESSION['username'], $article);

    // Exécuter la requête
    if ($stmt->execute() === TRUE) {
        // Rediriger vers la page de confirmation de modification
        header("Location: confirmation.php");
        exit();
    } else {
        echo "Erreur lors de la publication de l'article : " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication d'articles</title>
</head>
<body>
    <h2>Publication d'articles</h2>
    <form action="" method="post">
        <label for="article">Article :</label><br>
        <textarea id="article" name="article"></textarea><br><br>
        <button type="submit" name="submit">Valider</button>
    </form>
</body>
</html>
