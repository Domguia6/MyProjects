<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
     <div class="bg_img" >
        <h3>SCHOOL TROC</h3>
        <div class="liens">
            
            <a href="../PHP/inscription.php"> Troquer
                <div class="login">
                    <button><span>Se connecter</span></button>
                    <hr>
                    <p>Vous n'avez pas encore de compte?</p>
                    <button><span>Inscrivez-vous!</span></button>
                </div>
            </a>
            <a href="../PHP/Articles.php">Acheter</a>
            <a href="../HTML/indexe.html">Accueil</a>
        </div><br><br><br>
       
     </div>
     <h1>CONSULTEZ TOUS LES ARTICLES POSTES!</h1>
     <center><button>Let's start</button></center>
     <P style="font-weight: bold;">Ensemble disons OUI a la promotion de l'education.</P>
    </header>
    <h2 style="text-align:center; margin-top:70px; font-weight:200px; font-size:30px;">FAITES VOTRE CHOIX!</h1>
       <h2 style="text-align:center; margin-top:30px; font-weight:200px; font-size:30px; color:red;"><u>TERMINALES</U></h2>

      <section class='produit'>
       <div class='classe'>
        <h4><br>  CHOIX DE LA CLASSE</h4>
   
     <hr><br>
            <a href='Sixieme1.php' style='color:green;'>Sixiemes</a><br><br><br>
            <a href='Cinquieme1.php' style='color:red;'>Cinquiemes</a><br><br><br>
            <a href='Quatrieme1.php' style='color:indigo;'>Quatriemes</a><br><br><br>
            <a href='Troisieme1.php' style='color:blue;'>Troisiemes</a><br><br><br>
            <a href='Seconde1.php' style='color:purple;'>Secondes</a><br><br><br>
            <a href='Premiere1.php' style='color:brown;'>Premieres</a><br><br><br>
            <a href='Articles1.php' style='color:black;'>Terminales</a><br><br><br>

    </div>
    <?php

  /*  echo"<section class='produit'>
    <div class='classe'>
        <h4><br>  CHOIX DE LA CLASSE</h4>
   
     <hr><br>
            <a href='Sixieme.php' style='color:green;'>Sixiemes</a><br><br><br>
            <a href='Cinquieme.php' style='color:red;'>Cinquiemes</a><br><br><br>
            <a href='Quatrieme.php' style='color:indigo;'>Quatriemes</a><br><br><br>
            <a href='Troisieme.php' style='color:blue;'>Troisiemes</a><br><br><br>
            <a href='Seconde.php' style='color:purple;'>Secondes</a><br><br><br>
            <a href='Premiere.php' style='color:brown;'>Premieres</a><br><br><br>
            <a href='Articles.php' style='color:black;'>Terminales</a><br><br><br>

    </div>";*/

    try{
        $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='school_troc');
       }catch(Exception $e){
        die ('Erreur: ' . $e->getMessage());
       }


       $sql = "SELECT articles.NOM AS nom_article, articles.MATIERE, articles.PRIX,articles.IMAGES, articles.QUALITE, client.NOMS  AS nom_client, client.EMAIL, client.TELEPHONE, client.CLASSES 
       FROM articles 
       INNER JOIN client ON articles.ID_article = client.ID
       WHERE  articles.CLASSE='Terminales'";
     
     $result = $connexion->query($sql);
    /* if ($result !== false) {
     if ($result->num_rows > 0) {
       // Affichage des noms des étudiants
     
       while ($row1 = $result->fetch_assoc()) {
          
         echo "<section class='produits'>";
          echo "   <div class='home'>";
              echo "<div class='box'>";
              echo "<img src=../IMAGES/". $row1["IMAGES"].">";
              echo "</div>";
              echo "<div class='info'>";
              echo "<H4>Matiere:".$row1["MATIERE"];
              echo "<BR>Prix:".$row1["PRIX"];
              echo "<BR>Qualite:".$row1["QUALITE"];
              echo "<br>Vendeur:".$row1["nom_client"];
              echo "<br>Email:<a href='mailto:".$row1["EMAIL"]."'>".$row1["EMAIL"]."</a>";
  
              echo "</div ></section>";   
       } 
   }
}*/
       /*$sql1 = "SELECT * FROM articles WHERE CLASSE='Terminales'";

       $result1 = $connexion->query($sql1);*/
   
    
    // Boucle pour afficher les images par groupes de 3
    $counter = 0;
    if ($result->num_rows > 0) {
    while ($row1 = $result->fetch_assoc()) {
       
        if ($counter % 2 == 0) {
            echo '<div class="ligne">';
        }
        echo "<div class='box'>";
        echo "<img src=../IMAGES/". $row1["IMAGES"]."><br>";
        echo "</div>";
        echo "<div class='info'>";
        echo "<H4>Matiere: ".$row1["MATIERE"];
        echo "<BR>Prix: ".$row1["PRIX"];
        echo "<BR>Qualite: ".$row1["QUALITE"];
        echo "<br>Vendeur: ".$row1["nom_client"];
        echo "<br>Classe: ".$row1["CLASSES"];
      //  echo "<br>Email:<a href='mailto:".$row1["EMAIL"]."'>".$row1["EMAIL"]."</a>";
        echo "<br><center><button><a href='#'>Troquer</a></button></center>";
        echo "</div >";
        $counter++;
        
        if ($counter % 2 == 0) {
           

            echo '</div>';
            
        }
     
    }
   
}
    
    // Fermeture de la dernière div si le nombre d'images n'est pas un multiple de 3
   
    if ($counter % 2 != 0) {
        echo '</div>';
       
   
}
    
   
    
       ?>
</section>

<footer>
    <p>Inscrivez-vous nombreux afin de profiter de nombreuses ressources disponibles sur ce site!&nbsp;&nbsp;&nbsp;&nbsp;<button style="background-color: rgb(17, 16, 15); border-color: black;"><a href="../PHP/inscription.php" style=" text-align: center; color: rgb(217, 221, 245);">Inscription</a></button></p>
    <div class="icones">
    <img src="../IMAGES/facebook_6422199.png">
    <img src="../IMAGES/whatsapp_6422213.png">
    <img src="../IMAGES/linkedin_6422202.png">
    <img src="../IMAGES/twitter_6422210.png">
    </div>
    <p>Toujours plus pres de vous!</p>
    <div class="app">
        <img src="../IMAGES/app_store.png">
        <img src="../IMAGES/play_store.png">
    </div>
    <hr>

     <div class="ref">
       <p>Pour reussir dans la vie, il faut mettre toutes les chances de son coté!</p>
       <p>&copy; Medom Domguia Grace Astrid</p>
     </div>
 </footer>
</body>


<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Roboto', sans-serif;
}
/*en-tete*/
.info button a{
    color:white;
    text-decoration:none;
}
.info button{
    background-color:brown;
    border:2px solid wheat;
    transition: 0.5s ease-out;
}
.info button:hover{
    transform: scale(1.07);

}
.bg_img{
  
    background: url("../IMAGES/backpack-book-student-with-learning-nature-summer-education-adventure-travel-generated-by-artificial-intelligence_188544-102049.jpg");
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 80vh;
    align-items: center;
    display: flex;
    justify-content: center;



}

.liens a{
    font-weight: bold;
    font-size: 1rem;
    color:white;
    margin-top:10;
    float:right;
    margin-left:30px;
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
    margin-bottom:400px;
    margin-left:770px;

}
h1{
    text-align: center;
    margin-top: -200px;
    color:black;
    opacity: 0.9; 
}
header p{
    text-align: center;
    margin-top: 80px;
    color:white ; 
    opacity: 0.9; 
    
}
h3{
    margin-bottom:450px;
    color: wheat;
    cursor: pointer;
    opacity: 0.9; 
}
button{
    cursor: pointer;
    background-color: rgb(23, 147, 248);
    color: aliceblue;
    width:120px;
    height:30px;
    margin-top: 10px;
    opacity: 0.9; 
    font-size: 16px;
    border-color: rgb(23, 147, 248) ;
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


/* home */

.home{
    margin-top:60px;
    display: block;
    justify-content: space-between;
   /* margin-left:80px;
    background-color:rgb(208, 207, 207);
    margin-top:60px;*/

}
.produits{
    display: block;
    margin-left:100px;
   
    
}
.classe{
    flex-direction:block;
    width:200px;
    height:600px;
    background-color:rgb(208, 207, 207);
    margin-top:60px;
    margin-left:40px;
    border-radius:20px;x
}


 .classe a{
 text-align:center;
 margin-left:40px;
font-size:20px;
color:red;
margin-bottom:10px;
}

.classe h4{
  
    margin-bottom:50px;
    margin-left:13px;
}
 .produit{
  
 display:flex;
  

 }

 .box{
    margin-top:30px;
    width:200px;
    height:280px;
   margin-right:30px;
   margin-bottom:100px;
   box-shadow: 0 0 25px rgba(0, 0, 0.5, 0.5);
   
 }
 .home .box img{
    width:250px;
    height:300px;
    cursor:pointer;
 }
 .info{
    width:250px;
    height:150px;
    background-color:rgb(249, 238, 238);
    margin-top:20px;
    box-shadow: 0 0 25px rgba(0, 0, 0.5, 0.5);
  margin-top:-77px;
  margin-bottom:30px;


 }
 .info H4{
    margin-left:15px;
 }

 .content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around; /* Répartir l'espace de manière égale autour des images */
}

.ligne {
    flex-basis: calc(30.33% - 100px); /* Calcul de la largeur pour afficher jusqu'à 3 images par ligne en tenant compte des marges */
    margin: 10px; /* Marge autour de chaque image */
    
    MARGIN-LEFT:30px;
    margin-top:35px;
}

.ligne img {
    width: 250px; /* Largeur de l'image pour remplir entièrement son conteneur */
    height: 300PX; /* Hauteur automatique pour conserver les proportions */

    transition: 0.5s ease-out;
}
.ligne img:hover{
    transform: scale(1.05);
}
/*
.ligne {
    display: flex;
    justify-content: space-around;
    width: 50%; /* Ajuste la largeur en fonction de ta mise en page */
  /* margin-bottom: 20px; /* Espace entre chaque ligne d'images */






/*footer*/
footer{
    background-color: #331804df;
    color: black;
    margin-top: 70px;
    width: 100%;
  
    padding: 25px 10%;
    
}
footer img{
    width: 20px;
   cursor: pointer;
    margin-left: 50px;
}
footer p{
    font-family: 'Roboto', sans-serif;
    margin-top: 10px;
    margin-left: 50px;
    color: aliceblue;
}
footer .icones{
    display: flex;
    position: relative;
    margin-top: 30px;
    margin-left: 50px;
}
footer .icones{
    width: 50px;
}
footer .app:first-child{
    
    margin-left: 30px;
    justify-content: space-between;
}
footer .app img{
  width: 130px;
  margin-left: 50px;
  margin-top: 20px;
}
 footer hr{
    border: 0;
    width:100%;
    height:2px;
    background-color: #999;
    margin: 30px 0;
    margin-left: 30px;
}
.ref p{
    text-align: center;
}

</style>

</html>