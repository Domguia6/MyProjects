<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Form for posting an article -->
<form action="test2.php" method="post">
    <label for="titre">Titre de l'article :</label>
    <input type="text" name="titre" id="titre"><br>
    
    <label for="contenu">Contenu de l'article :</label>
    <textarea name="contenu" id="contenu" rows="4" cols="50"></textarea><br>
    
    <input type="submit" value="Valider">
</form>

</body>
</html>