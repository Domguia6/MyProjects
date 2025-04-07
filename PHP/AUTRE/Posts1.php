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
session_start();
// Initialize $id variable

/*$id = ""; 
//$id = isset($_GET['id']) ? $_GET['id'] : '';
if(isset($_GET['id'])) {
    $id = $_GET['id'];*/
 try{
    $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='troc');
   }catch(Exception $e){
    die ('Erreur: ' . $e->getMessage());
   }
   $sql1 = "SELECT NOM,NOMS,MATIERE,QUALITE,CLASSE,PRIX,IMAGES,ID_article FROM articles";
 
 // Exécution de la requête
 $result1 = $connexion->query($sql1);
 
 // Vérification s'il y a des résultats
 if ($result1->num_rows >0) {
     // Affichage des noms des étudiants
     while ($row = mysqli_fetch_assoc($result1)) {
        echo "<center><table>";
        echo "<form action='Modifier.php?id=".$row['ID_article']."' method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='".$row['ID_article']."'>";
     
      /*  echo"<td><input type=  'hidden' name='nom' id='nom' value='".$row['NOM']."'></td></tr>"; 
       
        echo" <td><input type='hidden' name='mat' id='mat' value='".$row['MATIERE']."'></td></tr>";
      
        
  
        echo " <td>
        <select id='classe' name='classe' value='".$row['CLASSE']."' hidden   class='classe'>
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

    echo " <td><input type='hidden' name='prix' id='prix'value='".$row['PRIX']."'  style=' text-decoration:line-through;'></td></tr>";
  echo" <td><input type='hidden' name='img' id='img' class='img' accept='image/*' value='".$row['IMAGES']. "' style='padding-right:2px;'  ></td></tr>";
    echo " <tr><td colspan='2'><center><input type='hidden'  value='MODIFIER' class='button'></center></td>";*/
    



/*}else{
    echo "ID non specifie";
}*/


// Initialisation de la variable $id

?>
   
  <form action="Posts1.php" method="post" enctype='multipart/form-data'>
 
    <center><div class='message'>

<h2>Voulez-vous modifier une information?</h2>

       <input type="submit" name="submit" class="oui" value="OUI">
   </form>
    <?php
     
 
    
   echo" <ul><a href='Articles1.php' class='non'>NON</a></ul>
    </div></center>";
}}
    // echo "  <td><a href='Modifier2.php?id=".$row1["ID"]."'>Modifier<img src='../IMAGES/51648.png' width='15px'></a>
?>
    <style>
        .message{
         margin-top:200px;
         border:2px solid black;
         box-shadow:0 0 25px rgba(0, 0, 0.5, 0.5);
         width:600px;
         height:170px;
         background-color:#CCCCCC;
         border-radius:20px;
         z-index:1;
         position: absolute;
         margin-left:350px;
        }
        .non{
            float:right;
            margin-right:100px;
        }
        .oui{
            float:left;
            margin-left:100px;
            background-color:blue;
            width:60px;
            height:30px;
            color:white;
            text-align:center;
            margin-top:30px;
            border-radius:10px;
        }
        a{
            text-decoration:none;
            background-color:blue;
            width:60px;
            height:30px;
            color:white;
            text-align:center;
            margin-top:30px;
            border-radius:10px;
        }
        body{
            background-color:#E0E0E0;
        }
        h2{
            margin-top:30px;
        }
   
        </style>

</body>
</html>