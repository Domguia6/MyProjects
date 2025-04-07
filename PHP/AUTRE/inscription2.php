<?php
session_start();
    //Creation des tables.
    try{
        $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='troc');
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
            NOMS VARCHAR(30) NOT NULL,
            MATIERE VARCHAR(60) NOT NULL,
            QUALITE VARCHAR(20) NOT NULL,
            CLASSE VARCHAR(30) NOT NULL,
            PRIX VARCHAR(255)NOT NULL,
            IMAGES BLOB NOT NULL,
            EMAIL VARCHAR (50) NOT NULL,
            ID_article INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            ID_client INT (255),
            FOREIGN KEY (ID_client) REFERENCES client(ID)
            )";
            if (mysqli_query($connexion,$sql2) === TRUE) {
              echo "<br>La table ARTICLES a été créée avec succès ou elle existait déjà!";
            } else {
              echo "Erreur lors de la création de la table  : " . $connexion->error;
            }

            $sql3="CREATE TABLE IF NOT EXISTS messages (
             
              sender_username VARCHAR(255) NOT NULL,
             receiver_username VARCHAR(255) NOT NULL,
              Messages TEXT,
              id INT AUTO_INCREMENT PRIMARY KEY,
              timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
          )";
           if (mysqli_query($connexion,$sql3) === TRUE) {
            echo "<br>La table messages a été créée avec succès ou elle existait déjà!";
          } else {
            echo "Erreur lors de la création de la table  : " . $connexion->error;
          }
             //Recuperation et Insertion des donnees des formulaires dans la base de donnees.

             if(isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['class'])&& isset($_POST['email'])&&isset($_POST['tel'])&&isset($_POST['pw'])){
              $_SESSION['nom']=$_POST['nom'];
             
              $_SESSION['prenom']=$_POST['prenom'];
              
              $_SESSION['email']=$_POST['email'];
             
              $_SESSION['tel']=$_POST['tel'];
             
              $_SESSION['pw']=$_POST['pw'];
              
              $_SESSION['class']=$_POST['class'];

              $classe=$_SESSION['class'];
              $nom=$_SESSION['nom'];
              $prenom=$_SESSION['prenom'];
              $email=$_SESSION['email'];
              $tel=$_SESSION['tel'];
              $pw=$_SESSION['pw'];
/* 
  $motdepasse = $_POST['motdepasse'];
   $motdepasseHashe = password_hash($motdepasse, PASSWORD_DEFAULT);
*/
              $preparation1= "INSERT INTO client(NOMS,PRENOMS,CLASSES,EMAIL,TELEPHONE,MOT_DE_PASSE) VALUES ('$nom','$prenom','$classe','$email','$tel','$pw')";
              $execution1= mysqli_query($connexion,$preparation1);
              Header('Location:Postes.php');
             }

             


            
           
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMAGES/back-school-design-with-colorful-pencil-scissors-ruler-typography-letter-black-chalkboard-background_1314-2440.jpg">
    <title>Site web de Troc mixte</title>
</head>
<body>
   
</body>
</html>


