<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom_prenom = $_POST["nom_prenom"];
    $adresse_mail = $_POST["adresse_mail"];
    $message = $_POST["message"];


    $destinataire = "nolan@nolan-fitness.go.yj.fr";

    // Sujet de l'e-mail
    $sujet = "Nouveau message du formulaire de contact";

    // Corps de l'e-mail
    $corps_message = "Nom & Prénom: $nom_prenom\n";
    $corps_message .= "Adresse e-mail: $adresse_mail\n\n";
    $corps_message .= "Message:\n$message";

    // En-têtes de l'e-mail
    $headers = "De: $adresse_mail\r\n";
    $headers .= "Répondre à: $adresse_mail\r\n";


    mail($destinataire, $sujet, $corps_message, $headers);

    // Redirection 
    header("Location: ../pages/merci.php");
    exit();
}
