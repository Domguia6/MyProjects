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
    <title>Confirmation de modification</title>
</head>
<body>
    <h2>Confirmation de modification</h2>
    <p>Voulez-vous modifier vos informations ?</p>
    <a href="article.php">Oui</a>
</body>
</html>
