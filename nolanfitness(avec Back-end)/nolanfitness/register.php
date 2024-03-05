<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO clients (prenom, nom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $prenom, $nom, $email, $mot_de_passe);

    if ($stmt->execute()) {
        echo "Compte créé avec succès!";
    } else {
        echo "Erreur lors de la création du compte: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
