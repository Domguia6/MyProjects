<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    < <link rel="icon" href="../IMAGES/back-school-design-with-colorful-pencil-scissors-ruler-typography-letter-black-chalkboard-background_1314-2440.jpg">
    <title>Site web de Troc mixte</title>
</head>
<body>
    <?php
     if(isset($_GET['id'])) {
        try{
            $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='troc');
        }catch(Exception $e){
         die ('Erreur: ' . $e->getMessage());
        }
        $id = $_GET['id'];
        if (isset($_POST['nom'])&&isset($_POST['mat'])&&isset($_POST['qlte'])&&isset($_POST['classe'])&&isset($_POST['prix'])){
            $nom=$_POST['nom'];
            $mat=$_POST['mat'];
            $qlte=$_POST['qlte'];
            $classe=$_POST['classe'];
            $prix=$_POST['prix'];
              
            if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
              $tempName = $_FILES['img']['tmp_name'];
              $imageName = $_FILES['img']['name'];
              $uploadPath = '../IMAGES/' . $imageName;
      
              if (move_uploaded_file($tempName, $uploadPath)) {
                  
            
    
            $sql = "UPDATE articles SET NOM='$nom', MATIERE='$mat', QUALITE='$qlte', CLASSE='$classe', PRIX='$prix', IMAGES='$imageName' WHERE ID_article=$id";
            $result = $connexion->query($sql);
             
            if ($connexion->affected_rows == 1){
              // Affichage du formulaire pré-rempli avec les informations actuelles
           echo "<center><div class='sms'><h1 style='color:blue;'>MISE A JOUR REUSSIE</h1><a href='Articles1.php'>NEXT</a></div></center>";

             // header ('Location : Articles.php');
              
            }else{
               // header ('Location : Articles.php'); 
  echo "MISE A JOUR ECHOUEE";
            }
            }else{
                echo "Une erreur est survenue lors du telechargement de l'image";
            }
        }
         }
            $connexion->close();
      
        }else {
            echo "ID non spécifié.";
          }
    ?>

    <style>
        .sms{
            width:400px;
            height:100px;
            border-radius:20px;
            background-color:#e4e0dddf;
            margin-top:220px;
        }
        a{
         
          margin-top:20px;
          color:red;
        }
        h1{
            margin-top:20px;
        }
        </style>
</body>
</html>