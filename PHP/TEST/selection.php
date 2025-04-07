<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: inscription.php");
    exit();
}
// Récupérer l'ID de l'article sélectionné
if(isset($_GET['id'])) {
    $article_id = $_GET['id'];
    // Récupérer les articles de l'utilisateur
    // Vous devrez effectuer une requête SQL pour récupérer les articles de l'utilisateur à partir de la base de données
    // Par souci de concision, je ne fournirai pas de code pour cela dans cette réponse
    // Vous devez également afficher les articles de l'utilisateur avec un bouton "Troquer" à côté de chacun d'eux
} else {
    echo "ID de l'article non spécifié.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélection d'articles à échanger</title>
</head>
<body>
    <h2>Sélection d'articles à échanger</h2>
    <!-- Afficher les articles de l'utilisateur avec un bouton "Troquer" à côté de chacun d'eux -->
    <!-- Lorsque l'utilisateur clique sur "Troquer", il sera redirigé vers la page de confirmation du troc -->
</body>
</html>
