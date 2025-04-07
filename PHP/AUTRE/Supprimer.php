<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMAGES/back-school-design-with-colorful-pencil-scissors-ruler-typography-letter-black-chalkboard-background_1314-2440.jpg">
    <title>Site web de Troc mixte</title>
</head>
<body>
<?php
// Vérifier si l'ID est présent dans l'URL
if(isset($_GET['id'])) {
    try{
        $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='troc');
       }catch(Exception $e){
        die ('Erreur: ' . $e->getMessage());
       }

  // Supprimer l'enregistrement correspondant à l'ID spécifié
  $id = $_GET['id'];
  
  // Requête pour supprimer l'enregistrement
  $sql = "DELETE FROM articles WHERE ID_article=$id";

  if ($connexion->query($sql) === TRUE) {
      echo "<div>Enregistrement supprimé avec succes</div>";
      Header('Location: MonCompte.php');
  } else {
    echo "Erreur lors de la suppression de l'enregistrement : " . $connexion->error;
  }

  $connexion->close();
} else {
  echo "ID non spécifié.";
}
?>
</body>
</html>