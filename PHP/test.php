<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="articles">
    <?php
    // Connexion à la base de données et récupération des images associées aux articles
    try{
        $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='school_troc');
       }catch(Exception $e){
        die ('Erreur: ' . $e->getMessage());
       }
       $sql1 = "SELECT * FROM articles WHERE CLASSE='Terminales'";

       $result1 = $connexion->query($sql1);
   
    
    // Boucle pour afficher les images par groupes de 3
    $counter = 0;
    while ($row = $result1->fetch_assoc()) {
        if ($counter % 3 == 0) {
            echo '<div class="ligne">';
        }
        echo "<img src=../IMAGES/". $row["IMAGES"].">";
        
        $counter++;
        
        if ($counter % 3 == 0) {
            echo '</div>';
        }
    }
    
    // Fermeture de la dernière div si le nombre d'images n'est pas un multiple de 3
    if ($counter % 3 != 0) {
        echo '</div>';
    }
    ?>
</div>
<style>
    .articles {
    display: flex;
    flex-wrap: wrap;
}

.ligne {
    display: flex;
    justify-content: space-around;
    width: 100%; /* Ajuste la largeur en fonction de ta mise en page */
    margin-bottom: 20px; /* Espace entre chaque ligne d'images */
}

.ligne img {
    width: 20%; /* Pour afficher 3 images côte à côte, divise l'espace par 3 */
    margin: 5px; /* Espace entre chaque image */
}

</style>
</body>
</html>