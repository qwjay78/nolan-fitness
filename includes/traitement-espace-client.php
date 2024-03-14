<?php
// Vérifier si un fichier a été téléchargé
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
    $uploadsDirectory = '../membres/avatars/';
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Obtenir l'extension du fichier téléchargé
    $fileExtension = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));

    // Vérifier si l'extension est valide
    if (in_array($fileExtension, $allowedExtensions)) {
        // Générer un nom de fichier unique
        $newFileName = $_SESSION['client_id'] . '_' . uniqid() . '.' . $fileExtension;

        // Déplacer le fichier téléchargé vers le répertoire des avatars
        $destination = $uploadsDirectory . $newFileName;
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $destination)) {
            // Mettre à jour le chemin de l'avatar dans la base de données
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $updateAvatar = $conn->prepare('UPDATE clients SET avatar = ? WHERE id = ?');
            $updateAvatar->bind_param('si', $newFileName, $_SESSION['client_id']);
            $updateAvatar->execute();
            $updateAvatar->close();
            $conn->close();

            // Stocker le nom du fichier de l'image dans une variable de session
            $_SESSION['avatar'] = $newFileName;

            // Rediriger vers la page d'espace client avec succès
            header('Location: ./espace-client.php?id=' . $_SESSION['client_id']);
            exit();
        } else {
            $msg = "Une erreur s'est produite lors du téléchargement de l'avatar.";
        }
    } else {
        $msg = "Votre photo de profil doit être au format jpg, jpeg, png ou gif.";
    }
}

// infos profil
// maj prénom
$prenom = $_SESSION['prenom'];
$prenomMaj = ucfirst($prenom);

// maj nom
$nom = $_SESSION['nom'];
$nomMaj = ucfirst($nom);

// Mettre à jour les informations de profil de l'utilisateur dans la table clients
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Connexion à la base de données
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Préparez la requête SQL pour mettre à jour les informations de l'utilisateur dans la table clients
  $updateQuery = $conn->prepare('UPDATE clients SET genre = ?, date_naissance = ?, poids = ?, programme = ? WHERE id = ?');
  $updateQuery->bind_param('ssdsi', $_POST['genre'], $_POST['date_naissance'], $_POST['poids'], $_POST['programme'], $_SESSION['client_id']);

  // Exécutez la requête de mise à jour
  $updateQuery->execute();

  // Fermez la requête et la connexion à la base de données
  $updateQuery->close();
  $conn->close();
}

// Récupérer les informations de l'utilisateur depuis la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$selectUserInfo = $conn->prepare('SELECT genre, date_naissance, poids, programme FROM clients WHERE id = ?');
$selectUserInfo->bind_param('i', $_SESSION['client_id']);
$selectUserInfo->execute();
$selectUserInfo->bind_result($genre, $date_naissance, $poids, $programme);
$selectUserInfo->fetch();
$selectUserInfo->close();
$conn->close();
?>