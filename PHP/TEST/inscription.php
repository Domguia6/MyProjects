<?php
session_start();
if(isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "school_troc");

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Préparer la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO utilisateurs (username, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $email);

    // Exécuter la requête
    if ($stmt->execute() === TRUE) {
        // Stocker les données dans la session
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        // Rediriger vers la page de publication d'articles
        header("Location: publication.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription : " . $conn->error;
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
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email"><br><br>
        <button type="submit" name="submit">Valider</button>
    </form>
</body>
</html>
