<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: inscription.php");
    exit();
}

// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "school_troc");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer les messages entre l'utilisateur connecté et un autre utilisateur
$sql = "SELECT * FROM messages WHERE sender_username = ? OR receiver_username = ? ORDER BY timestamp DESC";
$stmt = $conn->prepare($sql);
if ($stmt){
$stmt->bind_param("ss", $_SESSION['username'], $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();

// Afficher les messages
while($row = $result->fetch_assoc()) {
    echo "<p><strong>" . $row['sender_username'] . ":</strong> " . $row['message'] . "</p>";
}
}
// Formulaire d'envoi de message
echo "<form action='send_message.php' method='post'>";
echo "<input type='text' name='receiver_username' placeholder='Nom d'utilisateur destinataire'><br>";
echo "<textarea name='message' placeholder='Votre message'></textarea><br>";
echo "<button type='submit' name='submit'>Envoyer</button>";
echo "</form>";
?>
