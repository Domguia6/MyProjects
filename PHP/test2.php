<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['titre']) && isset($_POST['contenu'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    
    // Affichage de la question de confirmation pour la modification
    echo "Voulez-vous effectuer une modification ?";
    
    // Form for confirming the modification
    echo "<form action='test3.php' method='post'>";
    echo "<input type='hidden' name='titre' value='$titre'>";
    echo "<input type='hidden' name='contenu' value='$contenu'>";
    echo "<input type='submit' name='modification' value='Oui'>";
    echo "</form>";
}
?>

</body>
</html>