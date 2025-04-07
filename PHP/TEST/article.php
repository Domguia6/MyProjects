<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: inscription.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>
    <h2>Articles</h2>
    <!-- Afficher tous les articles disponibles avec un bouton "Troquer" -->
    <p>Article 1 <a href="messaging.php?id=1">Troquer</a></p>
    <p>Article 2 <a href="messaging.php?id=2">Troquer</a></p>
    <!-- Ajoutez plus d'articles ici -->
</body>
</html>
