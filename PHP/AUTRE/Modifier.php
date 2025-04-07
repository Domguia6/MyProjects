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
if(isset($_GET['id'])) {
    
    try{
        $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='troc');
       }catch(Exception $e){
        die ('Erreur: ' . $e->getMessage());
       }
    

  // Récupérer les informations de l'enregistrement à modifier
  $_SESSION['id']=$_POST['id'];
  $id = $_SESSION[ 'id'];
 // echo "<h4 style='color:red'>ID reçu : ".$id."</h4>"; 
 /* if( isset($_POST['nom']) && isset($_POST['ingre']) && isset($_POST['etape']) && isset($_POST['duree'])){
  $nom=$_POST['nom'];
  $ingre=$_POST['ingre'];
  $etape=$_POST['etape'];
  $duree=$_POST['duree'];*/

  $sql = "SELECT * FROM articles WHERE ID_article=$id";
 // $sql = "UPDATE plats SET Nom='$nom',Ingredients='$ingre',Duree='$duree',Etapes='$etape' WHERE ID=$id";
  $result = $connexion->query($sql);
  
 
  if ($result->num_rows ==1) {
   // if (mysqli_num_rows($result) == 1) {
    // Affichage du formulaire pré-rempli avec les informations actuelles
   $row = $result->fetch_assoc();
  
 //$row1 =mysqli_fetch_assoc($result);
    echo "<center><table>";
    echo "<form action='Update.php?id=".$row['ID_article']."' method='post' enctype='multipart/form-data'>";
    echo "<input type='hidden' name='id' value='".$row['ID_article']."'>";
    echo" <tr> <td><label for='nom'>NOM:</label></td>";
    echo"<td><input type='text' name='nom' id='nom' value='".$row['NOM']."'></td></tr>"; 
    echo"<tr><td><label for='mat'>MATIERE:</label></td>";
    echo" <td><input type='text' name='mat' id='mat' value='".$row['MATIERE']."'></td></tr>";
    echo "<tr><td><label for='qualite'>QUALITE:</label></td>";
  /*  echo"<td><input type='radio' name='qlte' id='vieux' value='".($row['QUALITE']=='vieux')? 'checked' : ''."' ><label for='vieux' class='radio'>Vieux</label>
    <input type='radio' name='qlte' id='neuf' value='".($row['QUALITE']=='neuf')? 'checked' : ''."'><label for='neuf' class='radio'>Neuf<label></td></tr>";*/
    echo "<td><input type='radio' name='qlte' id='vieux' value='vieux' ".($row['QUALITE']=='vieux' ? 'checked' : '')."><label for='vieux' class='radio'>Vieux</label>";
    echo "<input type='radio' name='qlte' id='neuf' value='neuf' ".($row['QUALITE']=='neuf' ? 'checked' : '')."><label for='neuf' class='radio'>Neuf</label></td></tr>";
    
    echo"<tr><td><label for='classe'>CLASSE:</label></td>";
    echo " <td>
    <select id='classe' name='classe' value='".$row['CLASSE']."'  class='classe'>
        <option value='6ième'>6ième</option>
        <option value='5ième'>5ième</option>
        <option value='4ième'>4ième</option>
        <option value='3ième'>3ième</option>
        <option value='2ndes'>2ndes</option>
        <option value='1ères'>1ères</option>
        <option value='Terminales'>Terminales</option>
    </select>
</td>
</tr>";
echo" <tr><td><label for='prix'>PRIX:</label></td>";
echo " <td><input type='number' name='prix' id='prix'value='".$row['PRIX']."'  style=' text-decoration:line-through;'></td></tr>";
echo " <tr><td><label for='img'>IMAGE:</label></td>";
echo" <td><input type='file' name='img' id='img' class='img' accept='image/*' value='".$row['IMAGES']. "' style='padding-right:2px;'  ></td></tr>";
echo " <tr><td colspan='2'><center><input type='submit'  value='MODIFIER' class='button'></center></td>";
  } else {
    echo "Aucun enregistrement trouvé.";
  }
 
  //value='".$row1['Nom']."'></td></tr>";
  $connexion->close();
  //mysqli_close($connexion);

}else {
    echo "ID non spécifié.";
  }
?>

<style>
    body{
      
    background: url("../IMAGES/learning-new-trends_1098-15860_2.jpg");
    background-position: center;
    background-size: cover;
    width: 95%;
    height: 100%;
   background-repeat:no-repeat;
    display: flex;
    justify-content: center;
    }
    input{
   margin-top:10px;
  /* margin-left:20px;*/
   border:2px solid rgb(73, 3, 3);
   padding:5px;
   padding-right:90px;
   margin-right:10px;
  
    }
    label{
        margin-right:20px;
        color:white;
        font-weight:bold;
    }
    table{
         margin-top:120px;
         border: 3px solid rgb(73, 3, 3);
         box-shadow: 0 0 25px rgba(0, 0, 0.5, 0.5);
    }
 .button{
   margin-top:20px;
   border-radius:14px;
   padding:8px;
   background-color:rgb(73, 3, 3);
   color:white;
   transition:0.5s ease-out;
    }
    .button:hover{
        transform: scale(1.10);
    }
.classe{
    margin-right:20px;
    color:black;
    border:2px solid rgb(73, 3, 3) ;
  padding:05px;
  padding-right:165px;
}
h2{
    color:rgb(73, 3, 3);
}
.radio{
    color:black;
}
.img{
    color:blue;
}
    </style>
</body>
</html>