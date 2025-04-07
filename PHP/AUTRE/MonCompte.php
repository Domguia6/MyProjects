<?php
session_start();
if (!$_SESSION['email']){
    Header ('Location:Connexion2.php');
}
try{
    $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='troc');
   }catch(Exception $e){
    die ('Erreur: ' . $e->getMessage());
   }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMAGES/back-school-design-with-colorful-pencil-scissors-ruler-typography-letter-black-chalkboard-background_1314-2440.jpg">
    <title>Site web de Troc mixte</title>
</head>
<body>


    <div class="messages">
    <center><h2 style='text-align:center;color:#bb2337;border-style:dashed;'>CONSULTEZ VOTRE MESSAGERIE</h2></center>
    <?php
   
   $_SESSION['email'];
   $_SESSION['nom'];
  
    $email=$_SESSION['email'];
  
    $nom=$_SESSION['nom'];
   
    $sql="SELECT * FROM client";
    $exec= mysqli_query($connexion,$sql);
    
    $counter=0;
     while ($row=mysqli_fetch_assoc($exec)){
      if ($counter % 5 == 0) {
        echo "<table> <tr style='width:100%;border:2px solid back;'>";}
        ?>
         <center><form action="message.php?nom=<?php echo $row['NOMS'];?>"  method="post">
  
     <td style=" border:2px solid back;"><input type="submit" value="VOS MESSAGES AVEC  <?php echo  $row['NOMS'];?>">
  <input type="hidden" name="nom" value="<?php echo $row['NOMS']; ?>"></form></center>
        <?php
      $counter++;
      if ($counter % 5 == 0) {
           

        echo '</tr>';
        
    }
     }
     if ($counter % 5 != 0) {
      echo '</tr>';
     
 
}
     echo "</tr></table>";
    ?>
    <button>
<a href="../HTML/indexe.html">Retourner!</a></button>
<table border="2"  style="width:100%; height:400px">
<br><br> <thead style="background-color:black;color:white;">
            <th>IMAGES</th>
            <th>AUTEUR</th>
            <th>PRIX</th>
           
            <th width="15%">ACTIONS</th>
            
        </thead>
        

<?php

try{
    $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='TROC');
   }catch(Exception $e){
    die ('Erreur: ' . $e->getMessage());
   }
   if (isset($_POST['nom'])&&isset($_POST['email'])&&isset($_POST['pw'])){
    $_SESSION['nom']=$_POST['nom'];  
    $_SESSION['email']=$_POST['email'];
    $_SESSION['pw']=$_POST['pw'];
    


    $nom=$_SESSION['nom'];
          $mail=$_SESSION['email'];
          $pw=$_SESSION['pw'];
   }
   $nom=$_SESSION['nom'];
          $mail=$_SESSION['email'];
          $pw=$_SESSION['pw'];
   echo "<h1 style='text-align:center;color:#bb2337'>SUPPRESSION D'ARTICLES</h1>";
    // Requête SQL pour récupérer les noms des administrateurs.
 $sql1 = "SELECT * FROM articles WHERE NOMS='$nom'";
 
 // Exécution de la requête
 $result1 = mysqli_query($connexion,$sql1);
// $result1 = $connexion->query($sql1);

 // Vérification s'il y a des résultats
 if ($result1->num_rows > 0) {
     // Affichage des noms des étudiants
     
   //  while ($row1 =$result1->fetch_assoc()) {
     while ($row1 =mysqli_fetch_assoc($result1)) {
       echo "<tr style='background-color:white;color:black;'>";
     
       echo "<td width='20%'><div style='background-color:white;' class='div'><img class='img'src=../IMAGES/". $row1["IMAGES"]. "></div></td>";
       echo "<td style='background-color:gray;text-align:center; width:200px;' >". $row1["NOMS"] . "</td>";
       echo "<td style='background-color:gray; text-align:center; width:200px;' >". $row1["PRIX"] . "</td>";
  
    echo "  <td style='background-color:gray;'>
    <center><a href='Supprimer.php?id=".$row1["ID_article"]."' style='float:right;margin-left:-80px;'>Supprimer<img src='../IMAGES/icons8-poubelle-16.png' ></a></center></td>";

        
     }
 } else {
     echo "Aucun ARTICLE trouvé.";
 }
   
 $connexion->close(); 
 // Fermeture de la connexion à la base de données
 ?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
header{
    position: fixed;
    top: 0;
    left: 0;
    background-color:wheat;
    justify-content: space-between;
    width: 100%;
    align-items: center;
    display: flex;
    padding:2px 10%;
    z-index: 100;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  height:100px;
    margin-bottom:170px;
}
.login{
    position: absolute;
    flex-direction: column;
    right: -22px;
    top:60px;
    width:270px;
    display:none;
    padding: 20px;
    align-items: center;
    background-color: black;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    opacity: 0.9;
}
button a{
    text-decoration:none;
    color:white;
   }
   button{
    width:90px;
    height:30px;
    background-color:brown;
    margin-top:20px;
   }
.login button{
    width:100%;
 border: 1px solid red;
 background-color: transparent;
    border-radius: 20px;
    opacity: 0.9;
    border-color: red;
}
hr{
    border: 0;
    width:100%;
    height:1px;
    background-color: #999;
    margin: 30px 0;
    opacity: 0.9;
}
.login p{
    font-size: 14px;
    font-weight: 400;
    margin-top:25px;
    opacity: 0.9;
    color: bisque;
}

h3{
    margin-bottom:450px;
    color: wheat;
    cursor: pointer;
    opacity: 0.9; 
}
.login::after{
    position: absolute;
    right: 40px;
    top:-8px;
    content:"";
    height: 25px;
    width: 25px;
    z-index: -3;
    background-color: black;
     box-shadow: 0 0 10px rgba(0,0,0,0.2);
     transform: rotate(40deg);
     opacity: 0.9;
}
.login::before{
    position: absolute;
    right: 40px;
    top:-10px;
    content:"";
    height: 25px;
    width: 25px;
    background-color: black;
     transform: rotate(40deg);
     opacity: 0.9;
}
a:hover .login{
    display: block;

}
.retour{
  background-color:gray;
  width:100px;
  height:30px;
  border-radius:10px;
  text-align:center;
}
   td a{
        text-decoration:none;
        color:white;
        background-color:red;
        border-radius:5px;
        padding:2px;
     margin-right:30px;
       
    }
   td a:hover{
        background-color:purple;
        color:yellow;
    }
    .img{
        width:120px;
        height:100px;
     margin-left:30px;
    }
  input{
    background-color:white;
    border: 2px solid gray;
    height:20px;
 margin-left:10px;
 width:230px;
   
  }
  form{
    width:100%;;
    height:auto;
  
  }

  .liens a{
    font-weight: bold;
    font-size: 1rem;
    color:black;
  margin-bottom:200px;
    float:right;
    margin-left:35px;
    cursor: pointer;
    transition: 0.5s ease-out;
    opacity: 0.9; 
}
.liens a:hover{
    color:rgb(0, 19, 32);
    transform: scale(1.05);
    letter-spacing: 1px;
}
.liens{
    margin-top:-460px;
    margin-left:730px;

}
.bg_img{
  width:100%;
  height:50px;
  background-color:green;
margin-top:-10;
position:fixed;

}
a{
  text-decoration:none;
  color:black;
 TEXT-align:center;
}
    </style>
</table>
</body>
</html>