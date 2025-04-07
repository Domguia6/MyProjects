<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

     try{
        $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='school_troc');
       }catch(Exception $e){
        die ('Erreur: ' . $e->getMessage());
       }
     
    
       
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
              $preparation2 = "INSERT INTO articles (NOM,MATIERE,QUALITE,CLASSE,PRIX,IMAGES) VALUES ('$nom','$mat','$qlte','$classe','$prix', '$imageName')";
            //  $nouvelID = mysqli_insert_id($connexion); 
              if (mysqli_query($connexion, $preparation2)) {
                  echo "Enregistrement réussi!";
                  //Header("Location:Posts1.php?id=$nouvelID");
                  Header('Location:Posts1.php');
              } else {
                  echo "Erreur d'enregistrement: " . mysqli_error($connexion);
              }
          } else {
              echo "Erreur lors du téléchargement de l'image.";
          }
      }
  }
  
    ?>
<form action="Postes.php" method="post" id="form" enctype="multipart/form-data">
        <center><table >
           <thead>
            <th colspan="2"><h2>POSTEZ VOS ARTICLES</h2></th>
           </thead>
           <tr>
            <td><label for="nom">NOM:</label></td>
            <td><input type="text" name="nom" id="nom" required></td>
           </tr>
           <tr>
            <td><label for="mat">MATIERE:</label></td>
            <td><input type="text" name="mat" id="mat" required></td>
           </tr>
           <tr>
            <td><label for="qualite">QUALITE:</label></td>
            <td><input type="radio" name="qlte" id="vieux" value="vieux" required ><label for="vieux" class="radio">Vieux</label>
                <input type="radio" name="qlte" id="neuf" value="Neuf" required ><label for="neuf" class="radio">Neuf<label>
            </td>
           </tr>
           <tr>
            <td><label for="classe">CLASSE:</label></td>
            <td>
                <select id="classe" name="classe" required class="classe">
                    <option value='6ième'>6ième</option>
                    <option value='5ième'>5ième</option>
                    <option value='4ième'>4ième</option>
                    <option value='3ième'>3ième</option>
                    <option value='2ndes'>2ndes</option>
                    <option value='1ères'>1ères</option>
                    <option value='Terminales'>Terminales</option>
                </select>
            </td>
           </tr>
           <tr>
            <td><label for="prix">PRIX:</label></td>
            <td><input type="number" name="prix" id="prix" required style=" text-decoration:line-through;"></td>
           </tr>
           <tr>
            <td><label for="img">IMAGE:</label></td>
            <td><input type="file" name="img" id="img" class="img" accept="image/*" style="padding-right:2px;"  required></td>
           </tr>
           <tr>
            <td><input type="submit"  value="VALIDER" class="button"></td>
            <td><input type="reset" value="ANNULER" class="button" style="float:right;"></td>
           <input type="hidden" name="id">
           </tr>
    </table></center>
</form>

<style>
    body{
      
    background: url("../IMAGES/learning-new-trends_1098-15860_2.jpg");
    background-position: center;
    background-size: cover;
    width: 95%;
    height: 100%;
   
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
         margin-top:80px;
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