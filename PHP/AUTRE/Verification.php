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
       $nom=$_SESSION['nom']; 
       $mail=$_SESSION['email']; 
  
       $id = $_GET['id'];

       $sql = "SELECT * FROM articles WHERE ID_article=$id";
     
     $result = $connexion->query($sql);

  
if ($result){
     if ($result->num_rows >0) {
        // if (mysqli_num_rows($result) == 1) {
         // Affichage du formulaire pré-rempli avec les informations actuelles
        $row = $result->fetch_assoc();
       /* echo "<form action='' method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='".$row['ID_article']."'>";
        echo "<img src=../IMAGES/". $row["IMAGES"]."><br>";
        echo "<BR>Prix: ".$row["PRIX"]."<br><br><br><br>    ";*/
  }
}else{
    echo "Aucun identifiant trouvé.";
}
}


if(!empty($_GET['id'])) {
    $_SESSION['email'];
    $_SESSION['nom'];
$nom=$_SESSION['nom']; 
$mail=$_SESSION['email']; 
$_SESSION['id']=$_POST['id'];
$ident = $_SESSION['id'];

$sql1 = "SELECT articles.NOM AS nom_article, articles.MATIERE, articles.PRIX,articles.IMAGES, articles.QUALITE, client.NOMS  AS nom_client, client.EMAIL, client.TELEPHONE, client.CLASSES , articles.ID_article
FROM articles 
INNER JOIN client ON articles.CLASSE='Terminales'
WHERE ID_article=$ident ";
     
$result1 = $connexion->query($sql1);

echo "ARTICLES QUE ". $nom." POURRAIENT OFFRIR EN ECHANGE <br>";
$counter = 0;
if ($counter % 2 == 0) {
    echo '<div class="ligne">';
}
if($result1){
    if ($result->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
   // if (mysqli_num_rows($result) == 1) {
    // Affichage du formulaire pré-rempli avec les informations actuelles
   $row1 = $result1->fetch_assoc();
   
   echo "<form action='' method='post' enctype='multipart/form-data'>";
   echo "<input type='hidden' name='id' value='".$row1['ID_article']."'>";
   echo "<img src=../IMAGES/". $row1["IMAGES"]."><br><button><a href='Verification.php'>TROQUER</a></button>";
     echo "<BR>Prix: ".$row1["PRIX"]."<br><br>";
     echo "</div >";
     
     $prix=$row['PRIX'];
$prix1=$row1['PRIX'];
    if ($prix!=$prix1 ){
        echo "Impossible de proceder au troc";
      
    }else{
        echo "Vous pouvez proceder au troc!";
    }
     $counter++;
     
     if ($counter % 2 == 0) {
        

         echo '</div>';
}
}}
if ($counter % 2 != 0) {
    echo '</div>';}}}

?>