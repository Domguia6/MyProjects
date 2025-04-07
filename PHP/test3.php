<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['modification']) && isset($_POST['titre']) && isset($_POST['contenu'])) {
    $id = ''; // Récupérez l'ID de l'article à modifier depuis la base de données
    
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    
    // Affichez le formulaire de modification avec les données de l'article
    echo "Modification de l'article avec ID : $id<br>";
    echo "<form action='' method='post'>";
    echo "<input type='text' name='titre' value='$titre'><br>";
    echo "<textarea name='contenu' rows='4' cols='50'>$contenu</textarea><br>";
    echo "<input type='submit' value='Enregistrer les modifications'>";
    echo "</form>";
}
?>

</body>
</html>