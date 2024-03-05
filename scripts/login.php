<?php
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, prenom, nom, mot_de_passe FROM clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($client_id, $prenom, $nom, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($mot_de_passe, $hashed_password)) {
        
        echo "Connecté avec succès! Bienvenue, $prenom $nom!";
    } else {
        echo "Échec de la connexion. Vérifiez vos informations d'identification.";
    }

    $conn->close();
}
?>
