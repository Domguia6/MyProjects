<?php
session_start();
if (!$_SESSION['email']){
    Header ('Location:inscription.php');
}
if(!empty($_GET['id'])) {
    
    
    try{
        $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='troc');
       }catch(Exception $e){
        die ('Erreur: ' . $e->getMessage());
       }
      // $nom=$_SESSION['nom']; 
       $mail=$_SESSION['email']; 
  
       $id = $_GET['id'];
       $_SESSION['id']=$_POST['id'];
       $ident = $_SESSION['id'];
       $sql = "SELECT * FROM articles WHERE ID_article=$id";
     
     $result = $connexion->query($sql);

  echo "<center><H1>PROCEDER A L'ECHANGE</H1></center>";
if ($result){
     if ($result->num_rows >0) {

        // if (mysqli_num_rows($result) == 1) {
         // Affichage du formulaire pré-rempli avec les informations actuelles
        $row = $result->fetch_assoc();
        echo "<form  method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='nom' value='".$row['NOMS']."'>";
        ECHO "<center><div class='images'>";
        echo "<h5>ARTICLE POSTE  PAR ". $row['NOMS']. "</h5><br><br>";
        echo "<img src=../IMAGES/". $row["IMAGES"]."><br>";
        echo "<BR><h4>Prix: ".$row["PRIX"]."</h4><br><br><br><br></div></center> </form>";
  }
}else{
    echo "Aucun identifiant trouvé.";
}
}



    $_SESSION['email'];
  //  $_SESSION['nom'];
//$nom=$_SESSION['nom']; 
$mail=$_SESSION['email']; 
$_SESSION['id']=$_POST['id'];
$ident = $_SESSION['id'];

$sql1 = "SELECT articles.NOM AS nom_article, articles.MATIERE, articles.PRIX,articles.IMAGES, articles.QUALITE, client.NOMS  AS nom_client, client.EMAIL, client.TELEPHONE,articles.NOMS, client.CLASSES , articles.ID_article
FROM articles 
INNER JOIN client ON articles.CLASSE='5ième'
WHERE ID_article=$ident ";
     
$result1 = $connexion->query($sql1);




    
if($result1){
    if ($result1->num_rows >0) {
      
            $row1 = $result1->fetch_assoc();
            
            /*
            if ($result1->num_rows > 0) {
     // Affichage des noms des étudiants
     
   //  while ($row1 =$result1->fetch_assoc()) {
     while ($row1 =mysqli_fetch_assoc($result1)) {
            */
   // if (mysqli_num_rows($result) == 1) {
    // Affichage du formulaire pré-rempli avec les informations actuelles
 
   echo "<form action='' method='post' enctype='multipart/form-data'>";
   echo "<input type='hidden' name='nom' value='".$row1['NOMS']."'></form> ";
    ECHO "<center><div class='image'>";
   echo "<h5>ARTICLES QUE ". $row1['NOMS']." POURRAIT OFFRIR EN ECHANGE </h5><br>";
   echo "<img src=../IMAGES/". $row1["IMAGES"]."><br>";
     echo "<BR><h4>Prix: ".$row1["PRIX"]."</h4><br><br>";
    
     $prix=$row['PRIX'];
$prix1=$row1['PRIX'];
    if ($prix!==$prix1 ){
        echo "Impossible de proceder au troc car les prix des deux articles ne sont pas compatibles.";
    }else{
        echo "Les prix des deux articles sont compatibles donc pouvez echanger!<br>";
       echo "<form action='Messages.php?nom=".$row['NOMS']."' method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='nom' value='".$row1['NOMS']."'>";
        echo "<input type='submit' value='Messages'></div></center></FORM>";
    }         
 
     
        }}  
?>
<style>
    img{
        width:150px;
        height:auto;
        margin-top:-20px;
        border-radius:10px;
    }
    .image{
        width:290px;
        height:390px;
        border-radius:20px;
        border:3px solid gray;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    }
    input{
        margin-top:10px;
        width:100px;
        height:30px;
        border-radius:10px;
        background-color:gray;
        color:white;
    }
    h4{
        color:blue;
        margin-top:-10px;
    }
   .images{
    width:270px;
        height:270px;
        border-radius:20px;
        border:3px solid gray;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        margin-bottom:70px;
        margin-top:60px;
   }
   h1{
    color:brown;
    border-style:dashed;
   }
   h6{
    color:red;
   }
   button a{
    text-decoration:none;
    color:white;
   }
   button{
    width:90px;
    height:30px;
    background-color:brown;
    
   }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMAGES/back-school-design-with-colorful-pencil-scissors-ruler-typography-letter-black-chalkboard-background_1314-2440.jpg">
    <title>Site web de Troc mixte</title>
</head>
<body>
<button><a href="javascript:history.back()">Retourner!</a></button>
</body>
</html>