<?php
session_start();
if (!$_SESSION['email']){
    Header ('Location:inscription.php');
}
try{
    $connexion= mysqli_connect($host='localhost', $user='root', $password='', $database='troc');
   }catch(Exception $e){
    die ('Erreur: ' . $e->getMessage());
   }
   if(!empty($_GET['nom'])) {

    $name=$_GET['nom'];
    $_SESSION['email'];
    $_SESSION['nom'];
$nom=$_SESSION['nom']; 
$mail=$_SESSION['email']; 
  

    $sql3= "SELECT * FROM client WHERE NOMS=$name"; 
    $result3 = $connexion->query($sql3);
   
  /* if ($result3){
         if ($result3->num_rows >0) {
            $row3 = $result->fetch_assoc();*/
            if (isset ($_POST['submit']) && isset($_POST['message'])){
                $message=htmlspecialchars($_POST['message']);
                $sql1= "INSERT INTO messages (sender_username,receiver_username,Messages) VALUES ('$nom','$name', '$message')";
                $requete= mysqli_query($connexion,$sql1);

              
            }
        
       
           
      }
   
  // }
//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMAGES/back-school-design-with-colorful-pencil-scissors-ruler-typography-letter-black-chalkboard-background_1314-2440.jpg">
    <title>Site web de Troc mixte</title>
</head>
<body >
    <header class="header">

        <h3>SCHOOL TROC</h3>
        <div class="liens">
        <a href="../HTML/indexe.html">Accueil</a>
        <a href="Articles.php">Acheter</a>
        <a href="Articles1.php">Troquer</a>
        <a href="Connexion2.php">MonCompte</a>
        </div>
    </header>
    <form action="" method="post">
    <center><div class="sms">
        <table>
            <tr>
               
        <td><label for="sms">Envoyer un message:</label></td>
        <td><textarea name="message" cols="70px" rows="20px"></textarea></td>
        
</tr>

<tr>
   <td colspan="2"><input type="submit" value="Envoyer" name="submit"></td></tr>
</table></div></center>
</form>

<section id="messages">
    <?php
    $sql= "SELECT * FROM messages WHERE sender_username='$nom' AND receiver_username='$name' OR sender_username='$name' AND receiver_username='$nom'";
    $result= mysqli_query($connexion,$sql);
    echo "<div class='boite'><h2>BOITE DE RECEPTION</H2>";
    echo "<hr style='color:white;'>";
    if ($result){
    if ($result->num_rows > 0) {
      
        while ($row1 = mysqli_fetch_assoc($result)) {
            //ce que j'ai recu
            if ($row1['receiver_username'] === $nom){
            ?>
            <p style= "color:greenyellow;"><?php echo $row1['Messages']. "-- ".$name;?></p>
            <?php
            //ce que j'ai envoye
            }elseif($row1['receiver_username'] === $name){
                ?>
                <p style= "color:white;"><?php echo $row1['Messages']. "-- ".$nom;;
               
                ?></p>
                <?php
          
        }}       echo "</div>";}}
    ?>
    </section>


    <style>
      
        textarea{
            border-radius:10px;
            margin-top:150px;
            border:3px solid gray;
            
        }
        label{
            color:brown;
            font-weight:bold;
            margin-top:-10px;
          
        }
        p{
            margin-left:90px;
        }
      
input{
    margin-left:290px;
    margin-top:30px;
    border-radius:20px;
    background-color:gray;
    color:white;
    WIDTH:100px;
    height:30px;
}
.boite{
    width:300px;
    height:310px;
    border:2px solid gray;
    border-radius:10px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    margin-top:-380px;
    margin-left:40px;
    background-color:GRAY;
    border-color:black;
}
h2{
    text-align:center;
    color:black;
}
table{
    margin-left:300px;
}

.header{
  /*  display:flex;
    height:100px;
    width:100%;
    background-color:gray;
    margin-top:0;
    margin-left:0;
    margin-right:0;
*/
height:80px;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    background-color:#fff;
    display: flex;
    align-items: center;
   
    padding: 2px 10%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    z-index: 100;
}
a{
 
    margin-left:50px;
    color:black;
    font-size:16px;
    font-weight:bold;
}
a:hover{
    color:brown;
}
.liens{
    margin-left:500px;
}
h3{
    font-weight:bold;
    color:brown;
}
        </style>
</body>
</html>