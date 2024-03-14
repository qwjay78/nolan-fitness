<?php
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, prenom, nom, email, mot_de_passe FROM clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($client_id, $prenom, $nom, $email, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($mot_de_passe, $hashed_password)) {
        // Démarrer la session
        session_start();

        // Stocker les informations de l'utilisateur dans la session
        $_SESSION['client_id'] = $client_id;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        $_SESSION['email'] = $email;

        // Redirection vers l'espace client
        header("Location: ../pages/espace-client.php");
        exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
    } else {
        echo "Échec de la connexion. Vérifiez vos informations d'identification.";
    }

    $conn->close();
}
?>
