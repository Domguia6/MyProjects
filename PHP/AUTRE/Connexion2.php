<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMAGES/back-school-design-with-colorful-pencil-scissors-ruler-typography-letter-black-chalkboard-background_1314-2440.jpg">
    <title>Site web de Troc mixte</title>
</head>
<body>
<div class="align">
      <img src="../IMAGES/learning-new-trends_1098-15860_2.jpg"  class="img">
    <form action="Connexion2.php" method="post" id="form">
        <center><table >
            <thead><th colspan="2" ><h1>PAGE DE CONNEXION</h1></th></thead>
    
            
            <tr>
                <td><label for="nom">NOMS:</label></td>
                <td><input type="text" name="nom" id="nom" required >
    </tr>
            <tr>
                <td><label for="email">EMAIL:</label></td>
                <td><input type="email" name="email" id="email" required >
    </tr>
   
    <tr>
        <td><label for="pw">MOT DE PASSE: </label></td>
        <td><input type="password" name="pw" id="pw" required></td>
        
        <td><input type="hidden" name="id" id="" required></td>
    </tr>
   
   
    <tr><td colspan="2">
    <?php

      try{
        $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='troc');
       }catch(Exception $e){
        die ('Erreur: ' . $e->getMessage());
       }

       if (isset($_POST['email']) && isset($_POST['pw']) && isset($_POST['nom'])){
        $_SESSION['email']=$_POST['email'];
        $_SESSION['nom']=$_POST['nom'];  
        $_SESSION['pw']=$_POST['pw'];
      
        $email=$_SESSION['email'];
        $pw=$_SESSION['pw'];
        $nom=$_SESSION['nom'];
        // Requête pour vérifier les informations d'identification
        $sql = "SELECT * FROM client WHERE EMAIL='$email' AND MOT_DE_PASSE='$pw' AND NOMS='$nom'";
        $result = $connexion->query($sql);
        
        if ($result){
        if ($result-> num_rows > 0) {
        
             
              
              $classe=$_POST['class'];
          // Les informations d'identification sont correctes, l'utilisateur peut accéder au site
           Header ('Location:MonCompte.php');
       
        }else{
          echo"<h5>Nom ou Mot de passe ou email non correspondants</h5>";
          echo " <tr>
          <td colspan='2'>
          <a href='inscription.php'><img src='../IMAGES/93634.png' width='13px' style='margin-left:15px;'>Enregistrez-vous!</a></td>
      </tr>";
        }}else{
            echo "<h5 style='color:#bb2337 ;'>Aucune personne trouvée</h5>";
        }
    }
    ?>
</td></tr>
        <td><input type="submit" value="VALIDER" class="button" onclick="verif()"></td>
        <td><input type="reset" value="ANNULER" style="float:right;" class="button"></td>
        
    </table></center>
</form></div>



<!--
// Connexion à la base de données (à remplacer par vos propres informations de connexion)
$bdd = new PDO('mysql:host=localhost; dbname=recettes','root' ,'');
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$password1= $_POST['pw'];
// Vérification du mot de passe
if ($password1 === 'cuisinier') {
    // Enregistrement des données dans la base de données "cuisinier"
    $requete = $bdd->prepare('INSERT INTO cuisinier (Noms, Prenoms, Email) VALUES ('$nom', '$prenom', '$email')');
    $requete->execute($nom, $prenom, $email);
    // Redirection vers la page "cuisinier.php"
    header('Location: Cuisinier.php');
} elseif ($password1 === 'admin') {
    // Enregistrement des données dans la base de données "administrateur"
    $requete = $bdd->prepare('INSERT INTO administrateur (Noms, Prenoms, Email) VALUES ('$nom', '$prenom', '$email')');
    $requete->execute($nom, $prenom, $email);
    // Redirection vers la page "administrateur.php"
    header('Location: Admin.php');
} else {
    // Affichage d'un message d'erreur
    echo "<h1>Mot de passe incorrect</h1>";
}*/
?>-->





<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
 
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Roboto', sans-serif;
}

header{
    position: fixed;
    top: 0;
    left: 0;
    background-color: #fff;
    justify-content: space-between;
    width: 100%;
    align-items: center;
    display: flex;
    padding:2px 10%;
    z-index: 100;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}
header img{
    width: 20px;
}

.menu{
    width: 20px;
    cursor: pointer;
   
}

.logo{
  width: 80px;
}
h5{
    color: #bb2337;
    font-family: 'Anton', sans-serif;
    margin-left:20px;
}

.header_end{
    display: flex;
}
.header_end i{
    margin-right: 5px;
}
table{
    border: 2px solid gray;
    background-color:white;
   margin-right:90px;
    box-shadow: 0 0 25px rgba(0, 0, 0.5, 0.5);
    width:400px;
    height:300px;
    margin-top:20px;
   
}
input{
    padding-right: 20px;
    border-radius: 7px;
    border: 1px solid gray;
    padding:5px;
    padding-right: 40px;
    margin-bottom: 20px;
    margin-top:10px;
}
a{
    text-decoration: none;
    color:  blue;
    margin-top: -20px;
    margin-left:10px;
}
p{
    color: red;
    margin-bottom: 20px;
}
th{
    font-size: 10px;
    color: #bb2337;
   
    
}
.button{
    margin-right: 30px;
    margin-left: 20px;
    background-color: gray;
    color:black;
    transition: 0.5s ease-out;
   text-align:center; 
   margin-top:10px;
}
.button:hover{
  transform: scale(1.20);
  background-color:brown;
}
h1{
    margin-top: 20px;
    margin-bottom: 10px;
    font-family: 'Anton', sans-serif;
}

label{
    margin-left: 10px;
    color:black;
    font-weight: bold;

}
 .img{
    height:400px;
    box-shadow: 0 0 25px rgba(0, 0, 0.5, 0.5);
    width:550px;
  margin-left:40px;
  margin-top:-30px;

}
.align{
    display:flex;
    justify-content:space-between;
    margin-top:140px;
}
body{
    background-color:rgb(222, 220, 220);
}
</style>
</body>
</html
