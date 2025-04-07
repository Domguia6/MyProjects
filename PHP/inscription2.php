<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Creation des tables.
    try{
        $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='school_troc');
       }catch(Exception $e){
        die ('Erreur: ' . $e->getMessage());
       }

    $sql1 = "CREATE TABLE IF NOT EXISTS client (
        NOMS VARCHAR(30) NOT NULL,
        PRENOMS VARCHAR(30) NOT NULL,
        CLASSES VARCHAR(30) NOT NULL,
        EMAIL VARCHAR(50) NOT NULL,
        TELEPHONE BIGINT(12) NOT NULL,
        MOT_DE_PASSE VARCHAR(10)NOT NULL,
        ID INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY
        )";
        if (mysqli_query($connexion,$sql1) === TRUE) {
          echo "La table CLIENT a été créée avec succès ou elle existait déjà!";
        } else {
          echo "Erreur lors de la création de la table : " . $connexion->error;
        }

        $sql2="CREATE TABLE IF NOT EXISTS articles (
            NOM VARCHAR(50) NOT NULL,
            MATIERE VARCHAR(60) NOT NULL,
            QUALITE VARCHAR(20) NOT NULL,
            CLASSE VARCHAR(30) NOT NULL,
            PRIX VARCHAR(255)NOT NULL,
            IMAGES BLOB NOT NULL,
            ID_article INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            ID_client INT (255),
            FOREIGN KEY (ID_client) REFERENCES client(ID)
            )";
            if (mysqli_query($connexion,$sql2) === TRUE) {
              echo "La table ARTICLES a été créée avec succès ou elle existait déjà!";
            } else {
              echo "Erreur lors de la création de la table  : " . $connexion->error;
            }

             //Recuperation et Insertion des donnees des formulaires dans la base de donnees.

             if(isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['class'])&& isset($_POST['email'])&&isset($_POST['tel'])&&isset($_POST['pw'])){
              $nom=$_POST['nom'];
              $prenom=$_POST['prenom'];
              $email=$_POST['email'];
              $tel=$_POST['tel'];
              $pw=$_POST['pw'];
              
              $classe=$_POST['class'];
/*
  $motdepasse = $_POST['motdepasse'];
   $motdepasseHashe = password_hash($motdepasse, PASSWORD_DEFAULT);
*/
              $preparation1= "INSERT INTO client(NOMS,PRENOMS,CLASSES,EMAIL,TELEPHONE,MOT_DE_PASSE) VALUES ('$nom','$prenom','$classe','$email','$tel','$pw')";
              $execution1= mysqli_query($connexion,$preparation1);
              Header('Location:Postes.php');
             }

             


            
           
    
    ?>
</body>
</html>