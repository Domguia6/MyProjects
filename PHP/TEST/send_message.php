<?php
session_start();
if(isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $receiver_username = $_POST['receiver_username'];
    $message = $_POST['message'];
    
    // Vérifier si le destinataire existe dans la base de données
    // Vous devrez effectuer une requête SQL pour vérifier si le destinataire existe
    // Si le destinataire n'existe pas, affichez un message d'erreur

    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "school_troc");

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Préparer la requête d'insertion
    $sql = "INSERT INTO messages (sender_username, receiver_username, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $_SESSION['username'], $receiver_username, $message);

    // Exécuter la requête
    if ($stmt->execute() === TRUE) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message : " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
